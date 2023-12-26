function updatePaymentMethod(selectedRadio) {
    var paymentCell = document.getElementById('selectedPayment');
    var paymentMethod = '';

    switch (selectedRadio.value) {
        case '1':
            paymentMethod = 'コンビニ払い';
            break;
        case '2':
            paymentMethod = '代金引換';
            break;
        default:
            paymentMethod = '未選択';
            break;
    }    
    paymentCell.textContent = paymentMethod;
}