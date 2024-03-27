## Databases

* table: customers
    * id: uuid primary
    * name: string
    * document_type: enum
    * document_number: string // unique
    * email: string // unique
    * Idx (document_type, document_id)
    * Idx
* table: retailers
    * id: uuid primary
    * name: string
    * document_number: string // unique
    * email: string
* table: wallets
    * id: uuid
    * user_id: uuid
    * user_type: String
    * balance: int
* table: transactions
    * id: uuid
    * payer_id: uuid references wallet
    * payee_id: uuid references wallet
    * status: string
    * amount: int
