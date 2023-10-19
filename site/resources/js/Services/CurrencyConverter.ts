export default class CurrencyConverter {
    private $from: string = ""
    private $to: string = ""
    private $amount: number = 0

    from(code: string): this {
        this.$from = code
        return this
    }

    to(code: string): this {
        this.$to = code
        return this
    }

    amount(amount: number): this {
        this.$amount = amount
        return this
    }

    get(): number {
        return this.$amount
    }
}
