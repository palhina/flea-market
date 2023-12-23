function updatePaymentMethod(selectedRadio) {
    // テーブルの支払い方法のセルを取得
    var paymentCell = document.getElementById('selectedPayment');

    // 選択された支払い方法をテーブルに反映
    paymentCell.textContent = selectedRadio.value;
}