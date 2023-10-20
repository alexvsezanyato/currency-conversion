<script>
    import CurrencyChart from "@/Components/CurrencyChart.vue"

    export default {
        components: {
            CurrencyChart,
        },
        data() {
            return {
                chartSeries: [],

                sourceCode: "RUB",
                targetCode: "RUB",

                sourceValue: 0,
                targetValue: 0,

                targetOutputValue: 0,

                exchangeRates: [],
                rateCodeIndex: new Map,

                historicalRates: {},

                width: "100%",
            }
        },

        async mounted() {
            await this.updateLastRates()
            await this.updateChart()
        },

        methods: {
            async getLastRates() {
                const response = await fetch("/api/exchange-rate/get")
                const exchangeRates = await response.json()

                return exchangeRates
            },

            async updateLastRates() {
                this.exchangeRates = await this.getLastRates()

                this.sourceCode = this.exchangeRates[0].code
                this.targetCode = this.exchangeRates[0].code

                this.exchangeRates.map(e => this.rateCodeIndex.set(e.code, e))
            },

            updateCache(event) {
                this.updateLastRates()
            },

            onSubmit(e) {
                return "onSubmit"
            },

            updateSourceCode(event) {
                this.sourceCode = event.target.value
                this.updateChart()
            },

            updateTargetCode(event) {
                this.targetCode = event.target.value
                this.updateChart()
            },

            async updateChart() {
                let newRateCodes = []

                for (let code of [this.sourceCode, this.targetCode]) {
                    if (!this.historicalRates[code]) {
                        newRateCodes.push(code)
                    }
                }

                const newRateCodesQueryParam = newRateCodes.join("-")

                let response = await fetch(
                    `/api/exchange-rate/latest/${newRateCodesQueryParam}/10`
                )

                const newRates = await response.json()

                this.historicalRates = {...this.historicalRates, ...newRates}

                let series = []

                for (let code of [this.sourceCode, this.targetCode]) {
                    series.push({
                        name: code,
                        data: this.historicalRates[code]
                    });
                }

                if (series[0]) series[0].title = { text: this.sourceCode }
                if (series[1]) series[1].title = { text: this.targetCode }

                this.chartSeries = series
            },

            updateSourceValue(event) {
                this.sourceValue = event.target.value

                const sourceValue = this.rateCodeIndex.get(this.sourceCode).value
                const targetValue = this.rateCodeIndex.get(this.targetCode).value

                const amount = this.sourceValue
                this.targetOutputValue = (sourceValue / targetValue) * amount
            },

            preventNaN(event) {
                if (event.which < 48 || event.which > 57) {
                    event.preventDefault()
                }
            }
        }
    }
</script>

<template>
    <div class="currency-converter">
        <div class="input">
            <select @change="updateSourceCode" class="item" name="from">
                <template v-for="currency in exchangeRates">
                    <option :value="currency.code">{{ currency.code }}</option>
                </template>
            </select>

            <select @change="updateTargetCode" class="item" name="to">
                <template v-for="currency in exchangeRates">
                    <option :value="currency.code">{{ currency.code }}</option>
                </template>
            </select>
        </div>

        <div class="output">
            <input class="item" type="text" name="amount" @keypress="preventNaN" @input="updateSourceValue" placeholder="0">
            <input class="item" type="text" name="amount" :value="targetOutputValue" disabled placeholder="0">
        </div>

        <div class="bottom">
            <span class="info">База данных обновляется раз в день</span>

            <button class="update-cache-btn" @click="updateCache">Синхронизировать с сервером</button>
        </div>
    </div>

    <CurrencyChart title="График за последние 10 дней" :series="chartSeries" />
</template>

<style>
    @import "vue-select/dist/vue-select.css";
</style>

<style scoped>
    .currency-converter {
        --row-height: 44px;
        --row-padding: 0 14px;

        width: 100%;
        display: flex;
        flex-direction: column;
        align-items: flex-end;
    }

    .currency-converter > * {
        width: 100%;
        display: flex;
        gap: 10px;
    }

    .chart {
        width: 100%;
        border-radius: 10px;
        border: 1px solid hsla(220, 15%, 70%, .6);
        min-height: 300px;
    }

    .bottom {
        display: flex;
        justify-content: space-between;
        padding: 20px 0;
        align-items: center;
    }

    .input .item {
        width: 50%;
        border: 1px solid hsla(220, 15%, 70%, .6);
        border-top-right-radius: 10px;
        border-top-left-radius: 10px;
        height: var(--row-height);
        display: flex;
        align-items: center;
        padding: 0 14px;
        padding: var(--row-padding);
    }

    .output .item {
        width: 50%;
        border: 1px solid hsla(220, 15%, 70%, .6);
        border-top: none;
        border-bottom-right-radius: 10px;
        border-bottom-left-radius: 10px;
        height: var(--row-height);
        padding: var(--row-padding);
    }

    .update-cache-btn {
        padding: 8px 20px;
        background: hsla(200, 100%, 5%, 1);
        border-radius: 10px;
        color: #fff;
        font-weight: 900;
        width: fit-content;
        height: 33px;
        display: flex;
        align-items: center;
    }

    @media screen and (max-width: 576px) {
        .bottom {
            flex-direction: column-reverse;
            align-items: center;
            margin-top: 15px;
        }

        .info {
            align-self: center;
        }
    }
</style>
