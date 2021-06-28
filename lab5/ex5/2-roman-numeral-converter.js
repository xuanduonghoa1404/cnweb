let romanVals = [
	['M', 1000],
	['CM', 900],
	['D', 500],
	['CD', 400],
	['C', 100],
	['XC', 90],
	['L', 50],
	['XL', 40],
	['X', 10],
	['IX', 9],
	['V', 5],
	['IV', 4],
	['I', 1],
];

function convertToRoman(num) {
	let romanStr = '';

	for (let i = 0; i < romanVals.length; i++) {
		if (num >= romanVals[i][1]) {
			romanStr += romanVals[i][0];
			num -= romanVals[i][1];
			if (num >= romanVals[i][1]) {
				romanStr += romanVals[i][0];
				num -= romanVals[i][1];
				if (num >= romanVals[i][1]) {
					romanStr += romanVals[i][0];
					num -= romanVals[i][1];
				}
			}
		}
	}
	console.log(romanStr);
	return romanStr;
}

convertToRoman(36);
