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
                                <input type="text" class="form-control" id="commissionPercent">
                            </div>
                            <div class="form-group pb-2">
                                <label for="commission"><span class="text-danger">*</span> Комиссия, руб.</label>
                                <input type="text" class="form-control" id="commission">
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
    export default {
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
