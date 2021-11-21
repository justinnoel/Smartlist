function getLoanMonthlyFromLoan(amount, interest, years) {
  const calculatedInterest = parseFloat(interest) / 100 / 12;
  const calculatedPayments = parseFloat(years) * 12;
  const x = Math.pow(1 + calculatedInterest, calculatedPayments);
  return parseFloat(parseFloat((parseFloat(amount) * x * calculatedInterest) / (x - 1)).toFixed(2));
}
function calculateFutureValue(periods, presentValue, interestRate) {
  interestRate = (interestRate / 100);
  return parseFloat(parseFloat(presentValue*(1+interestRate)**periods).toFixed(2));
}
function getDiscount(price, discount) {
	return price - (price * (discount/100))
}


function getPercentage(partialValue, totalValue) {
  return parseInt((100 * partialValue) / totalValue);
} 

function getTax(price, tax) {
  return parseInt(price) + parseInt(getPercentage(tax, price))
}