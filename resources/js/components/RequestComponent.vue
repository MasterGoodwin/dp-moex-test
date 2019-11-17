<template>
    <div class="container">
        <div class="row">
            <div class="col-md-7 py-2 pl-2 pr-0">
                <table class="table table-striped my-2">
                    <tbody>
                        <tr>
                            <th>Клиент:</th>
                            <td>АКЦИОНЕРНОЕ ОБЩЕСТВО "ФАЛЬКОНФИНАНС", ИНН: 7718745690</td>
                        </tr>
                        <tr>
                            <td>Отправлена:</td>
                            <td>04.07.2019 17:52:41</td>
                        </tr>
                        <tr>
                            <td>ИНН клиента:</td>
                            <td>7718745690</td>
                        </tr>
                        <tr>
                            <td>ОГРН клиента:</td>
                            <td>1167746319322</td>
                        </tr>
                        <tr>
                            <td>Период:</td>
                            <td>с 04.06.2019 по 31.12.2019 (210 дн.)</td>
                        </tr>
                        <tr>
                            <td>Сумма продукта:</td>
                            <td>5 000 000.00 р.</td>
                        </tr>
                        <tr>
                            <td>Размер аванса:</td>
                            <td>20 000.00 р.</td>
                        </tr>
                        <tr>
                            <td>Переслать в документарном<br/> виде по адресу:</td>
                            <td>Московская обл, г Королев, ул Сакко и Ванцетти, д 20, кв 72</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="col-md-5 py-2 pl-0 pr-2">
                <div class="card shadow ">
                    <div class="card-header bg-white">Новое предложение</div>
                    <div class="card-body">
                        <form>
                            <div class="form-group pb-2">
                                <label for="commissionPercent"><span class="text-danger">*</span> Комиссия, %</label>
                                <input type="text" class="form-control" id="commissionPercent"
                                       v-model="formattedCommissionPercent"
                                       @keypress="numbersOnly($event)"
                                       @keydown="handleCommissionPercentChange($event)"
                                       @input="handleCommissionPercentInput"
                                       @focus="selectAll"
                                >
                            </div>
                            <div class="form-group pb-2">
                                <label for="commission"><span class="text-danger">*</span> Комиссия, руб.</label>
                                <input type="text" class="form-control" id="commission"
                                       v-model="formattedCommission"
                                       @keypress="numbersOnly($event)"
                                       @keydown="handleCommissionChange($event)"
                                       @input="handleCommissionInput"
                                       @focus="selectAll"
                                >
                            </div>
                            <div class="form-group pb-2">
                                <label for="description">Предложение</label>
                                <textarea class="form-control" id="description" rows="3"></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary"><i class="far fa-edit"></i> Сделать предложение</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import Vue2Filters from 'vue2-filters';

    export default {
        name: "RequestComponent",
        mixins: [Vue2Filters.mixin],
        data() {
            return {
                total: 5000000,
                commissionPercent: 0,
                commission: 0,
                isCommissionFieldActive: false
            }
        },
        watch: {
            commission() {
                if(this.commission > this.total) {
                    this.commission = this.total;
                }
                if(this.commission < 0) {
                    this.commission = 0;
                }
                // this.commissionPercent = parseFloat((this.commission / this.total * 100).toFixed(2));
            },
            commissionPercent() {
                if(this.commissionPercent > 100) {
                    this.commissionPercent = 100;
                }
                if(this.commissionPercent < 0) {
                    this.commissionPercent = 0;
                }
                // this.commission = parseFloat((this.commissionPercent * this.total / 100).toFixed(2));
            },

        },
        methods: {
            selectAll: function (event) {
                setTimeout(function () {
                    event.target.select()
                }, 0)
            },
            numbersOnly: function(evt) {
                evt = (evt) ? evt : window.event;
                let charCode = (evt.which) ? evt.which : evt.keyCode;
                if ((charCode > 31 && (charCode < 48 || charCode > 57)) && (charCode !== 46 || charCode !== 38 || charCode !== 40)) {
                    evt.preventDefault();
                } else {
                    return true;
                }
            },
            handleCommissionChange: function(evt) {
                evt = (evt) ? evt : window.event;
                let charCode = (evt.which) ? evt.which : evt.keyCode;
                let step = Math.pow(10,this.commission.toFixed().length)/10;

                if (charCode === 38) {
                    this.commission += step;
                    this.$nextTick(() => {
                        this.commissionPercent = parseFloat((this.commission / this.total * 100).toFixed(2));
                    });

                }
                if (charCode === 40) {
                    this.commission -= step;
                    this.$nextTick(() => {
                        this.commissionPercent = parseFloat((this.commission / this.total * 100).toFixed(2));
                    });

                }
            },
            handleCommissionInput(e) {
                let el = e.target;
                let sel = el.selectionStart;
                let spaces = el.value.split(" ").length - 1;
                this.$nextTick(() => {
                    if (this.formattedCommission.split(" ").length - 1 > spaces) {
                        sel += 1;
                    }
                    if (this.formattedCommission.split(" ").length - 1 < spaces) {
                        sel -= 1;
                    }
                    el.setSelectionRange(sel, sel);
                });
            },
            handleCommissionPercentChange: function(evt) {
                evt = (evt) ? evt : window.event;
                let charCode = (evt.which) ? evt.which : evt.keyCode;
                let step = 0.01;
                let commissionPercentString = this.commissionPercent.toString();
                for (let i = commissionPercentString.length - 1; i >= 0; i--) {
                    if (this.commissionPercent !== 0 && commissionPercentString[i] !== '.') {
                        if (commissionPercentString[i] == 0) {
                            if (step < 10) {
                                step = step * 10;
                            }
                        } else {
                            break;
                        }
                    }
                }

                if (charCode === 38) {
                    this.commissionPercent += step;
                    this.$nextTick(() => {
                        this.commission = parseFloat((this.commissionPercent * this.total / 100).toFixed(2));
                    });
                }
                if (charCode === 40) {
                    this.commissionPercent -= step;
                    this.$nextTick(() => {
                        this.commission = parseFloat((this.commissionPercent * this.total / 100).toFixed(2));
                    });
                }
            },
            handleCommissionPercentInput(e) {
                let el = e.target;
                let sel = el.selectionStart;
                this.$nextTick(() => {
                    el.setSelectionRange(sel, sel);
                });
            },
        },
        computed: {
            formattedCommission: {
                get: function() {
                    // if (this.isCommissionFieldActive) {
                    //     return parseFloat(this.commission).toFixed(2);
                    // }
                    return ((parseFloat(this.commission)).toFixed(2)).replace(/(\d)(?=(\d{3})+(?:\.\d+)?$)/g, "$1 ")
                },
                set: function(newValue) {

                    let clearFloat = parseFloat(parseFloat(newValue.replace(" ", "")).toFixed(2));
                    if (isNaN(clearFloat)) {
                        clearFloat = 0
                    }
                    this.commission = clearFloat;
                    this.commissionPercent = parseFloat((clearFloat / this.total * 100).toFixed(2));
                }
            },
            formattedCommissionPercent: {
                get: function() {
                    return (parseFloat(this.commissionPercent)).toFixed(2)
                },
                set: function(newValue) {
                    let clearFloat = parseFloat(parseFloat(newValue).toFixed(2));
                    if (isNaN(clearFloat)) {
                        clearFloat = 0
                    }
                    this.commissionPercent = clearFloat;
                    this.commission = parseFloat((clearFloat * this.total / 100).toFixed(2));
                }
            },
        },
        mounted() {

        }
    }
</script>
