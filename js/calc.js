$('#calcBtn').click(function () {
    var inCurrencyAmount = $('#inCurrencyAmount').val();
    var inCurrencyName = $('#inCurrencyName').val();
    var outCurrencyName = $('#outCurrencyName').val();
    var outText = calc(inCurrencyAmount, inCurrencyName, outCurrencyName, rates) +" "+ outCurrencyName;
    $('#outCurrencyText').val(outText);
    console.log(inCurrencyAmount + " - " + inCurrencyName + " output in: " + outCurrencyName);
});

function calc(inCurrencyAmount, inCurrencyName, outCurrencyName, rates) {
    return inCurrencyAmount / rates[inCurrencyName]*rates[outCurrencyName];
    console.log(rates);
    
}
