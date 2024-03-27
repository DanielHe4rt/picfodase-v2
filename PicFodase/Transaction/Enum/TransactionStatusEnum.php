<?php

namespace Picfodase\Transaction\Enum;

enum TransactionStatusEnum: string
{
    case Created = 'created';
    case Withdrawed = 'withdrawed';
    case Debited = 'debited';
    case Completed = 'completed';
}
