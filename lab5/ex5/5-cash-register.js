/*
Link: https://beta.freecodecamp.org/en/challenges/javascript-algorithms-and-data-structures-projects/cash-register
*/

function checkCashRegister(price, cash, cid) {
	//find the change (use toFixed)
	let change = (cash - price).toFixed(2); //0.50 centimes
	//find the number before ',' (Integer part) (convert it to String to find it, then Integer)
	let bDecimal = parseInt(change.toString().split('.')[0]);
	//find the number after ',' (Fractional part) (convert it to String to find it, then Integer)
	let aDecimal = parseInt(change.toString().split('.')[1]) / 100;
	//How many my cash register have in the range of values 100, 20, 10, 5 and 1
	let unitArray = [cid[8][1], cid[7][1], cid[6][1], cid[5][1], cid[4][1]];
	//How many my cash register have in the range of 0.25, 0.10, 0.02 and 0.01
	let unitArray2 = [cid[3][1], cid[2][1], cid[1][1], cid[0][1]];
	//The change of how many of each i have to give (only concern 100, 20, 10, 5, and 1)
	let unitArrayChange = [
		['ONE HUNDRED', 0],
		['TWENTY', 0],
		['TEN', 0],
		['FIVE', 0],
		['ONE', 0],
	];
	//The change of how many of each i have to give (only concern 0.25, 0.10, 0.05 and 0.01)
	let unitArrayChange2 = [
		['QUARTER', 0],
		['DIME', 0],
		['NICKEL', 0],
		['PENNY', 0],
	];

	//Copies to do maths
	let unitArrayChangeNew1 = [
		['ONE HUNDRED', 0],
		['TWENTY', 0],
		['TEN', 0],
		['FIVE', 0],
		['ONE', 0],
	];
	let unitArrayChangeNew2 = [
		['QUARTER', 0],
		['DIME', 0],
		['NICKEL', 0],
		['PENNY', 0],
	];

	let changeFactor = 0;
	let unitIndex = 0;

	let calc1 = 0;
	let calc2 = 0;

	//In the cash register, i check how many "Integer money" i have
	for (let k = 0; k < unitArray.length; k++) {
		calc1 += unitArray[k];

		//In the cash register, i check how many "Fractional money" i have
		for (let k = 0; k < unitArray2.length; k++) {
			calc2 += unitArray2[k];
		}
	}

	//To start with, if i don't have enough Integer money OR Fractional Money
	if (bDecimal > calc1 || aDecimal > calc2) {
		return { status: 'INSUFFICIENT_FUNDS', change: [] };
	}

	/*
	WORK ON INTEGER VALUES
	While my change is not ZERO and my cash register machin is not EMPTY
	I continue to check for every values possibles
	I update my cash register and my change
	*/
	while (bDecimal > 0) {
		if (bDecimal >= 100 && unitArray[0] >= 100) {
			changeFactor = 100;
			unitIndex = 0;
		} else if (bDecimal >= 20 && unitArray[1] >= 20) {
			changeFactor = 20;
			unitIndex = 1;
		} else if (bDecimal >= 10 && unitArray[2] >= 10) {
			changeFactor = 10;
			unitIndex = 2;
		} else if (bDecimal >= 5 && unitArray[3] >= 5) {
			changeFactor = 5;
			unitIndex = 3;
		} else if (bDecimal >= 1 && unitArray[4] >= 1) {
			changeFactor = 1;
			unitIndex = 4;
		} else {
			// break;
		}

		// update my bDecimal (Integer change)
		bDecimal = bDecimal - changeFactor;
		// update my cash register machine
		unitArray[unitIndex] = unitArray[unitIndex] - changeFactor;
		// update how MANY of this money i used
		unitArrayChange[unitIndex][1] = unitArrayChange[unitIndex][1] + 1;
		//use the precedent value to calcul how MUCH of this money i used
		unitArrayChangeNew1[unitIndex][1] =
			unitArrayChange[unitIndex][1] * changeFactor;
	}

	//reset
	changeFactor = 0;
	unitIndex = 0;

	/*
	WORK ON FRACTIONAL VALUES
	While my change is not ZERO and my cash register machin is not EMPTY
	I continue to check for every values possibles
	I update my cash register and my change
	*/
	while (aDecimal > 0) {
		if (aDecimal >= 0.25 && unitArray2[0] >= 0.25) {
			changeFactor = 0.25;
			unitIndex = 0;
		} else if (aDecimal >= 0.1 && unitArray2[1] >= 0.1) {
			changeFactor = 0.1;
			unitIndex = 1;
		} else if (aDecimal >= 0.05 && unitArray2[2] >= 0.05) {
			changeFactor = 0.05;
			unitIndex = 2;
		} else if (aDecimal >= 0.01 && unitArray2[3] >= 0.01) {
			changeFactor = 0.01;
			unitIndex = 3;
		} else {
			//break;
		}

		//update my bDecimal (Fractional change)
		aDecimal = aDecimal - changeFactor;

		//update my cash register machine (use parseFloat and toFixed to manage float Calcul)
		let valueFixed = parseFloat(
			unitArray2[unitIndex] - changeFactor
		).toFixed(2);
		unitArray2[unitIndex] = parseFloat(valueFixed);

		// update how MANY of this money i used
		unitArrayChange2[unitIndex][1] = unitArrayChange2[unitIndex][1] + 1;

		//Find how MUCH of this money i used (use parseFloat and toFixed to manage float Calcul)
		let valueFixed2 = (
			unitArrayChange2[unitIndex][1] * changeFactor
		).toFixed(2);
		unitArrayChangeNew2[unitIndex][1] = parseFloat(valueFixed2);
	}

	//concat my Integer and Fractional value from my cash register
	var unitArray3 = unitArray.concat(unitArray2);

	//delet empty value to check if cash register machin is empty or not later on
	unitArray3 = unitArray3.filter(function (x) {
		return x !== 0;
	});

	//Concat my two array into one
	var unitArrayChangeNew3 = unitArrayChangeNew1.concat(unitArrayChangeNew2);

	//Then EMPTY "0" values
	for (let k = 0; k < unitArrayChangeNew3.length; k++) {
		if (unitArrayChangeNew3[k][1] == 0) {
			unitArrayChangeNew3[k].splice(0, 1);
			delete unitArrayChangeNew3[k];
		}
	}
	//Then REMOVE "empty" values
	unitArrayChangeNew3 = unitArrayChangeNew3.filter(function (x) {
		return x !== (undefined || null || '');
	});

	//Handle if my register machin is empty or not
	if (unitArray3.length == 0) {
		return { status: 'CLOSED', change: cid };
	} else {
		return { status: 'OPEN', change: unitArrayChangeNew3 };
	}
}

console.log(
	checkCashRegister(19.5, 20, [
		['PENNY', 1.01],
		['NICKEL', 2.05],
		['DIME', 3.1],
		['QUARTER', 4.25],
		['ONE', 90],
		['FIVE', 55],
		['TEN', 20],
		['TWENTY', 60],
		['ONE HUNDRED', 100],
	])
);
console.log(
	checkCashRegister(3.26, 100, [
		['PENNY', 1.01],
		['NICKEL', 2.05],
		['DIME', 3.1],
		['QUARTER', 4.25],
		['ONE', 90],
		['FIVE', 55],
		['TEN', 20],
		['TWENTY', 60],
		['ONE HUNDRED', 100],
	])
);
console.log(
	checkCashRegister(19.5, 20, [
		['PENNY', 0.01],
		['NICKEL', 0],
		['DIME', 0],
		['QUARTER', 0],
		['ONE', 0],
		['FIVE', 0],
		['TEN', 0],
		['TWENTY', 0],
		['ONE HUNDRED', 0],
	])
);
console.log(
	checkCashRegister(19.5, 20, [
		['PENNY', 0.01],
		['NICKEL', 0],
		['DIME', 0],
		['QUARTER', 0],
		['ONE', 1],
		['FIVE', 0],
		['TEN', 0],
		['TWENTY', 0],
		['ONE HUNDRED', 0],
	])
);
console.log(
	checkCashRegister(19.5, 20, [
		['PENNY', 0.5],
		['NICKEL', 0],
		['DIME', 0],
		['QUARTER', 0],
		['ONE', 0],
		['FIVE', 0],
		['TEN', 0],
		['TWENTY', 0],
		['ONE HUNDRED', 0],
	])
);
