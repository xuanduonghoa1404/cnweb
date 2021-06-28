function balancedParens(string) {
	var stack = [];
	var pairs = {
		'[': ']',
		'{': '}',
		'(': ')',
	};
	var closers = {
		')': 1,
		']': 1,
		'}': 1,
	};
	for (var i = 0; i < string.length; i++) {
		var cur = string[i];
		if (pairs[cur]) {
			console.log(cur, '----', pairs[cur]);
			stack.push(pairs[cur]);
		} else if (cur in closers) {
			if (stack[stack.length - 1] === cur) {
				stack.pop();
			} else {
				return false;
			}
		}
	}
	return !stack.length;
}

function telephoneCheck(str) {
	if (!balancedParens(str)) {
		return false;
	}

	//remove whitespace
	var newStr = str.replace(/\s/g, '');

	//validation  regular expression or pattern
	var patt = /^1?\(?\d{3}-?\)?\d{3}-?\d{4}$/;

	return patt.test(newStr);
}

telephoneCheck('555-555-5555');
