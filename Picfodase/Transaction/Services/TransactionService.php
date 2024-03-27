<?php

namespace Picfodase\Transaction\Services;

use Illuminate\Support\Facades\DB;
use Picfodase\Notifications\NotificationContract;
use Picfodase\PaymentGateways\PaymentGatewayContract;
use Picfodase\PaymentGateways\PaymentGatewayServiceProvider;
use Picfodase\Transaction\DTO\TransactionDTO;
use Picfodase\Transaction\Enum\TransactionStatusEnum;
use Picfodase\Transaction\Repositories\TransactionRepository;
use Picfodase\Transaction\TransactionException;
use Picfodase\Wallet\Repository\WalletRepository;
use Picfodase\Wallet\Wallet;

class TransactionService
{
    public function __construct(
        private readonly TransactionRepository  $transactionRepository,
        private readonly WalletRepository       $walletRepository,
        private readonly PaymentGatewayContract $paymentGateway,
        private readonly NotificationContract   $notificationContract,
    )
    {
    }

    public function handle(TransactionDTO $transactionDTO): bool
    {
        // payer validations
        $payerWallet = $this->walletRepository->findById($transactionDTO->payerId);

        $this->validatePaymentConditions($payerWallet, $transactionDTO);


        return DB::transaction(function () use ($payerWallet, $transactionDTO) {
            $transaction = $this->transactionRepository->startTransaction($transactionDTO);
            $payeeWallet = $this->walletRepository->findById($transactionDTO->payeeId);

            $this->walletRepository->deposit($payeeWallet->getKey(), $transactionDTO->amount);
            $this->walletRepository->withdrawal($payerWallet->getKey(), $transactionDTO->amount);
            $this->transactionRepository->updateTransactionStatus($transaction->getKey(), TransactionStatusEnum::Completed);

            if (!$this->paymentGateway->authorizePayment()) {
                throw TransactionException::notAuthorizedByGateway($this->paymentGateway);
            }

            if (!$this->notificationContract->sendPaymentApproval()) {
                throw TransactionException::paymentMessageNotSent($this->notificationContract);
            }

            return true;
        });
    }

    private function validatePaymentConditions(Wallet $payerWallet, TransactionDTO $transactionDTO): void
    {
        if ($payerWallet->belongsToRetailer()) {
            throw TransactionException::retailerNotAllowedToPay();
        }

        if ($payerWallet->hasBalance($transactionDTO->amount)) {
            throw TransactionException::outOfPocket();
        }
    }
}
