function rot13(str) {
	let newStr = '';
	let regex = /[A-Z]/;
	let alphabet = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';

	for (let i = 0; i < str.length; i++) {
		if (str[i].match(regex)) {
			//if the ith value of str is a character A-Z:
			let index = alphabet.indexOf(str[i]); //using the current letter, find its index position from the alphabet
			let newIndex = index + 13; //shift the index by adding 13
			if (newIndex > 26) {
				//if the shifted value goes past the letters of the alphabet...
				newIndex = newIndex - 26; //...subtract the alphabet length from the value...
				newStr += alphabet[newIndex]; //...and start from the beginning of the alphabet. Add the character to the new string.
			} else if (newIndex == 26) {
				//should combine this else if with the if above:  newIndex >= 26.
				newStr += alphabet[0];
			} else {
				//if under 26, then just add character to new string
				newStr += alphabet[newIndex];
			}
		} else {
			//if this isn't a character A-Z, then just pass it on to the new string
			newStr += str[i];
		}
	}
	console.log(newStr);
	return newStr;
}

rot13('SERR PBQR PNZC');
