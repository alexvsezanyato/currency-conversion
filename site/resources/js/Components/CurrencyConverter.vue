<script>
    export default {
        name : 'x-add-information',

        props: {
            currencies: Object,
        },

        data() {
            return {
                sourceCode: "RUB",
                targetCode: "RUB",

                sourceValue: 0,
                targetValue: 0,

                targetOutputValue: 0,
            }
        },

        methods: {
            onSubmit(e) {
                return "onSubmit"
            },

            updateSourceCode(event) {
                this.sourceCode = event.target.value
            },

            updateTargetCode(event) {
                this.targetCode = event.target.value
            },

            updateSourceValue(event) {
                this.sourceValue = event.target.value

                const sourceValue = parseFloat(this.currencies[this.sourceCode].value.replace(`,`, `.`))
                const targetValue = parseFloat(this.currencies[this.targetCode].value.replace(`,`, `.`))

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
                <template v-for="currency in currencies">
                    <option>{{ currency.code }}</option>
                </template>
            </select>

            <select @change="updateTargetCode" class="item" name="to">
                <template v-for="currency in currencies">
                    <option>{{ currency.code }}</option>
                </template>
            </select>
        </div>

        <div class="output">
            <input class="item" type="text" name="amount" @keypress="preventNaN" @input="updateSourceValue" placeholder="0">
            <input class="item" type="text" name="amount" :value="targetOutputValue" disabled placeholder="0">
        </div>

        <button class="update-cache-btn" @click="updateCache">Обновить кеш</button>
    </div>

    <span>Значения кешируются, для синхронизации обновите страницу</span>
</template>

<style scoped>
    .currency-converter {
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

    .currency-converter .input .item {
        width: 50%;
        border: 1px solid hsla(220, 15%, 70%, .6);
        border-top-right-radius: 10px;
        border-top-left-radius: 10px;
    }

    .currency-converter .output .item {
        width: 50%;
        border: 1px solid hsla(220, 15%, 70%, .6);
        border-top: none;
        border-bottom-right-radius: 10px;
        border-bottom-left-radius: 10px;
    }

    .currency-converter .update-cache-btn {
        padding: 8px 20px;
        background: hsla(200, 100%, 46%, 1);
        border-radius: 50px;
        color: #fff;
        font-weight: 900;
        width: fit-content;
        margin: 5px 0;
    }
</style>
