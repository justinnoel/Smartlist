'use strict';
/**  
 * Gets the amount you have to pay for a loan monthly
 *  
 * @param {number} amount - Initial price
 * @param {number} interest - Interest rate
 * @param {number} years - Years you have to pay for the loan
 */ 
export function getLoanMonthlyFromLoan(amount, interest, years) {
  const calculatedInterest = parseFloat(interest) / 100 / 12;
  const calculatedPayments = parseFloat(years) * 12;
  const x = Math.pow(1 + calculatedInterest, calculatedPayments);
  return parseFloat(parseFloat((parseFloat(amount) * x * calculatedInterest) / (x - 1)).toFixed(2));
}
/**  
 * Calculates future value
 *  
 * @param {number} periods - Amount of periods you have to pay
 * @param {number} presentValue - Current value
 * @param {number} interestRate - Interest rate
 */ 
export function calculateFutureValue(periods, presentValue, interestRate) {
  interestRate = (interestRate / 100);
  return parseFloat(parseFloat(presentValue*(1+interestRate)**periods).toFixed(2));
}

/**  
 * Gets the discount of a given price
 *  
 * @param {number} price - Initial price
 * @param {number} interestRate - Percent discount
 */ 
export function getDiscount(price, discount) {
	return price - (price * (discount/100))
}

/**  
 * Gets the percent of a given price
 *  
 * @param {number} partialValue - The partial value (numerator)
 * @param {number} totalValue - The total value (denominator)
 */ 
export function getPercentage(partialValue, totalValue) {
  return parseInt((100 * partialValue) / totalValue);
} 

/**  
 * Gets the tax of a given price
 *  
 * @param {number} price - Initial price
 * @param {number} tax - Percent tax
 */ 
export function getTax(price, tax) {
  return parseInt(price) + parseInt(getPercentage(tax, price))
}