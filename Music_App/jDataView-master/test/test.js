var hasNodeRequire = typeof require === 'function' && typeof window === 'undefined';

if (hasNodeRequire) {
	jDataView = require('..');
	chai = require('chai');
}

var b = jDataView.from,
	assert = chai.assert,
	chr = String.fromCharCode,
	// workaround for http://code.google.com/p/v8/issues/detail?id=2578
	_isNaN = Number.isNaN || (function () { return this })().isNaN,
	isNaN = function (obj) {
		return _isNaN(obj) || (typeof obj === 'number' && obj.toString() === 'NaN');
	},
	dataBytes = [
		0x00,
		0xff, 0xfe, 0xfd, 0xfc,
		0xfa, 0x00, 0xba, 0x01
	],
	dataStart = 1,
	compatibility = jDataView.prototype.compatibility,
	engines = [];

compatibility.Array = true;

for (var engineName in compatibility) {
	if (compatibility[engineName]) {
		engines.push(engineName);
	}
}

function compareInt64(value, expected, message) {
	value = Number(value);
	assert.equal(value, expected, message || (value + ' != ' + expected));
}

function compareBytes(value, expected, message) {
	value = Array.prototype.slice.call(value);
	assert.deepEqual(value, expected, message || '[' + value + '] != [' + expected + ']');
}

function compareWithNaN(value, expected, message) {
	assert.ok(isNaN(value), message || value + ' != NaN');
}

engines.forEach(function (engineName) {
	suite(engineName, function () {
		var view;

		suiteSetup(function () {
			view = new jDataView(dataBytes.slice(), dataStart, undefined, true);
		});

		suiteTeardown(function () {
			compatibility[engineName] = false;
		});

		suite('should throw error on bound check for', function () {
			function testBounds(type) {
				var args = Array.prototype.slice.call(arguments, 1);
				test(type, function () {
					assert.Throw(function () {
						view['get' + type].apply(view, args);
					});
				});
			}

			testBounds('Char', 8);
			testBounds('String', 2, 7);
			testBounds('Int8', 8);
			testBounds('Uint8', 8);
			testBounds('Char', 8);
			testBounds('Int16', 7);
			testBounds('Uint16', 7);
			testBounds('Int32', 5);
			testBounds('Uint32', 5);
			testBounds('Float32', 5);
			testBounds('Float64', 1);
		});

		suite('should be correctly read for', function () {
			setup(function () {
				view.seek(0);
			});

			// getter = value || {value, check?, view?, args?}
			function testGetters(type, getters) {
				test(type, function () {
					getters.forEach(function (getter) {
						if (typeof getter !== 'object') {
							getter = {value: getter};
						}

						var args = getter.args || [],
							contextView = getter.view || view,
							check = getter.check || assert.equal,
							value = getter.value,
							offset = contextView.tell(),
							realValue = contextView['get' + type].apply(contextView, args);

						check(realValue, value, 'get' + type + '(' + args.join(', ') + ') == ' + realValue + ' != ' + value + ' at offset ' + offset + (getter.view ? ' in view [' + getter.view.getBytes(undefined, 0, true, true).join(', ') + ']' : ''));
					});
				});
			}

			testGetters('Bytes', [
				{args: [2, 1], value: [0xfe, 0xfd], check: compareBytes},
				{args: [3, 0, false], value: [0xfd, 0xfe, 0xff], check: compareBytes}
			]);

			testGetters('Char', [
				chr(0xff),
				chr(0xfe),
				chr(0xfd),
				chr(0xfc),
				chr(0xfa),
				chr(0),
				chr(0xba),
				chr(1)
			]);

			testGetters('String', [
				{args: [1, 0], value: chr(0xff)},
				{args: [1, 5], value: chr(0)},
				{args: [1, 7], value: chr(1)},
				{view: b(127, 0, 1, 65, 66), args: [5], value: chr(127) + chr(0) + chr(1) + chr(65) + chr(66)},
				{view: b(0xd1, 0x84, 0xd1, 0x8b, 0xd0, 0xb2), args: [undefined, undefined, 'utf8'], value: chr(1092) + chr(1099) + chr(1074)}
			]);

			test('Big String', function () {
				this.timeout(5000);
				var view = new jDataView(2000000);
				assert.doesNotThrow(function () {
					view.getString();
				});
			});

			testGetters('Int8', [
				-1,
				-2,
				-3,
				-4,
				-6,
				0,
				-70,
				1
			]);

			testGetters('Uint8', [
				255,
				254,
				253,
				252,
				250,
				0,
				186,
				1
			]);

			testGetters('Int16', [
				{args: [0], value: -257},
				{args: [1], value: -514},
				{args: [2], value: -771},
				{args: [3], value: -1284},
				{args: [4], value: 250},
				{args: [5], value: -17920},
				{args: [6], value: 442}
			]);

			testGetters('Uint16', [
				{args: [0], value: 65279},
				{args: [1], value: 65022},
				{args: [2], value: 64765},
				{args: [3], value: 64252},
				{args: [4], value: 250},
				{args: [5], value: 47616},
				{args: [6], value: 442}
			]);

			testGetters('Uint32', [
				{args: [0], value: 4244504319},
				{args: [1], value: 4210884094},
				{args: [2], value: 16448765},
				{args: [3], value: 3120626428},
				{args: [4], value: 28967162}
			]);

			testGetters('Int32', [
				{args: [0], value: -50462977},
				{args: [1], value: -84083202},
				{args: [2], value: 16448765},
				{args: [3], value: -1174340868},
				{args: [4], value: 28967162}
			]);

			testGetters('Float32', [
				{args: [0], value: -1.055058432344064e+37},
				{args: [1], value: -6.568051909668895e+35},
				{args: [2], value: 2.30496291345398e-38},
				{args: [3], value: -0.0004920212086290121},
				{args: [4], value: 6.832701044000979e-38},
				{view: b(0x7f, 0x80, 0x00, 0x00), value: Infinity},
				{view: b(0xff, 0x80, 0x00, 0x00), value: -Infinity},
				{view: b(0x00, 0x00, 0x00, 0x00), value: 0},
				{view: b(0xff, 0x80, 0x00, 0x01), check: compareWithNaN}
			]);

			testGetters('Float64', [
				{args: [0], value: 2.426842827241402e-300},
				{view: b(0x7f, 0xf0, 0x00, 0x00, 0x00, 0x00, 0x00, 0x00), value: Infinity},
				{view: b(0xff, 0xf0, 0x00, 0x00, 0x00, 0x00, 0x00, 0x00), value: -Infinity},
				{view: b(0x00, 0x00, 0x00, 0x00, 0x00, 0x00, 0x00, 0x00), value: 0},
				{view: b(0x80, 0x00, 0x00, 0x00, 0x00, 0x00, 0x00, 0x00), value: -0},
				{view: b(0x3f, 0xf0, 0x00, 0x00, 0x00, 0x00, 0x00, 0x00), value: 1},
				{view: b(0x3f, 0xf0, 0x00, 0x00, 0x00, 0x00, 0x00, 0x01), value: 1.0000000000000002},
				{view: b(0x3f, 0xf0, 0x00, 0x00, 0x00, 0x00, 0x00, 0x02), value: 1.0000000000000004},
				{view: b(0x40, 0x00, 0x00, 0x00, 0x00, 0x00, 0x00, 0x00), value: 2},
				{view: b(0xc0, 0x00, 0x00, 0x00, 0x00, 0x00, 0x00, 0x00), value: -2},
				{view: b(0x00, 0x00, 0x00, 0x00, 0x00, 0x00, 0x00, 0x01), value: 5e-324},
				{view: b(0x00, 0x0f, 0xff, 0xff, 0xff, 0xff, 0xff, 0xff), value: 2.225073858507201e-308},
				{view: b(0x00, 0x10, 0x00, 0x00, 0x00, 0x00, 0x00, 0x00), value: 2.2250738585072014e-308},
				{view: b(0x7f, 0xef, 0xff, 0xff, 0xff, 0xff, 0xff, 0xff), value: 1.7976931348623157e+308},
				{view: b(0xff, 0xf0, 0x00, 0x00, 0x00, 0x00, 0x00, 0x01), check: compareWithNaN}
			]);

			testGetters('Uint64', [
				{view: b(0x00, 0x67, 0xff, 0xff, 0xff, 0xff, 0xff, 0xfe), value: 29273397577908224, check: compareInt64},
				{view: b(0x00, 0x11, 0x22, 0x33, 0x44, 0x55, 0x66, 0x77), value: 4822678189205111, check: compareInt64}
			]);

			testGetters('Int64', [
				{args: [0, false], value: -283686985483775, check: compareInt64},
				{view: b(0xff, 0xff, 0xff, 0xff, 0xff, 0xff, 0xff, 0xfe), value: -2, check: compareInt64},
				{view: b(0x00, 0x11, 0x22, 0x33, 0x44, 0x55, 0x66, 0x77), value: 4822678189205111, check: compareInt64}
			]);

			testGetters('Unsigned', [
				// padded to byte here
				{args: [3, 1], value: 7},
				{args: [5], value: 30},
				// padded to byte here
				{args: [15], value: 32510},
				{args: [17], value: 64000},
				// padded to byte here
				{view: b(0xff, 0xff, 0xff, 0xff), args: [32], value: 0xffffffff}
			]);

			testGetters('Signed', [
				// padded to byte here
				{args: [3, 1], value: -1},
				{args: [5], value: -2},
				// padded to byte here
				{args: [15], value: -258},
				{args: [17], value: 64000},
				// padded to byte here
				{view: b(0xff, 0xff, 0xff, 0xff), args: [32], value: -1}
			]);
		});

		suite('should be correctly written for', function () {
			teardown(function () {
				view.setBytes(0, dataBytes.slice(dataStart), true);
			});

			// setter = value || {value, args?, getterArgs?, check?}
			function testSetters(type, setters) {
				test(type, function () {
					setters.forEach(function (setter) {
						if (typeof setter !== 'object') {
							setter = {value: setter};
						}

						var offset = setter.args ? setter.args[0] : 0,
							value = setter.value,
							args = [offset, value].concat(setter.args ? setter.args.slice(1) : []),
							getterArgs = setter.getterArgs || [offset],
							check = setter.check || assert.equal;

						assert.ok(('write' + type) in view, 'jDataView does not have `write' + type + '` method.');
						view['set' + type].apply(view, args);

						var realValue = view['get' + type].apply(view, getterArgs);

						check(realValue, value, 'set' + type + '(' + args.join(', ') + ') != get' + type + '(' + getterArgs.join(', ') + ') == ' + realValue);
					});
				});
			}

			testSetters('Bytes', [
				{args: [1], getterArgs: [2, 1], value: [0xfe, 0xfd], check: compareBytes},
				{args: [0, false], getterArgs: [3, 0, false], value: [0xfd, 0xfe, 0xff], check: compareBytes}
			]);

			testSetters('Char', [
				chr(0xdf),
				chr(0x03),
				chr(0x00),
				chr(0xff)
			]);

			testSetters('String', [
				{args: [2], getterArgs: [3, 2], value: chr(1) + chr(2) + chr(3)},
				{args: [1], getterArgs: [2, 1], value: chr(8) + chr(9)},
				{args: [0, 'utf8'], getterArgs: [6, 0, 'utf8'], value: chr(1092) + chr(1099) + chr(1074)}
			]);

			testSetters('Int8', [
				-10,
				29
			]);

			testSetters('Uint8', [
				19,
				129,
				0,
				255,
				254
			]);

			testSetters('Int16', [
				-17593,
				23784
			]);

			testSetters('Uint16', [
				39571,
				35
			]);

			testSetters('Int32', [
				-1238748268,
				69359465
			]);

			testSetters('Uint32', [
				3592756249,
				257391
			]);

			testSetters('Float32', [
				Math.pow(2, -149),
				-Math.pow(2, -149),
				Math.pow(2, -126),
				-Math.pow(2, -126),
				-1.055058432344064e+37,
				-6.568051909668895e+35,
				2.30496291345398e-38,
				-0.0004920212086290121,
				6.832701044000979e-38,
				Infinity,
				-Infinity,
				0,
				{value: NaN, check: compareWithNaN}
			]);

			testSetters('Float64', [
				Math.pow(2, -1074),
				-Math.pow(2, -1074),
				Math.pow(2, -1022),
				-Math.pow(2, -1022),
				2.426842827241402e-300,
				Infinity,
				-Infinity,
				0,
				1,
				1.0000000000000004,
				-2,
				{value: NaN, check: compareWithNaN}
			]);

			testSetters('Uint64', [
				{value: 29273397577908224, check: compareInt64},
				{value: 4822678189205111, check: compareInt64}
			]);

			testSetters('Int64', [
				{value: -283686985483775, check: compareInt64},
				{value: -2, check: compareInt64},
				{value: 4822678189205111, check: compareInt64}
			]);

			// setter = {value, bitLength}
			function testBitfieldSetters(type, setters) {
				test(type, function () {
					var view = new jDataView(13);

					function eachValue(callback) {
						view.seek(0);

						setters.forEach(function (setter) {
							callback.call(view, setter.value, setter.bitLength);
						});
					}

					eachValue(function (value, bitLength) {
						this['write' + type](value, bitLength);
					});

					eachValue(function (value, bitLength) {
						var realValue = this['get' + type](bitLength);
						assert.equal(realValue, value, 'write' + type + '(' + value + ', ' + bitLength + ') != get' + type + '(' + bitLength + ') == ' + realValue);
					});
				});
			}

			testBitfieldSetters('Unsigned', [
				// padded to byte here
				{value: 5, bitLength: 3},
				{value: 29, bitLength: 5},
				// padded to byte here
				{value: 19781, bitLength: 15},
				{value: 68741, bitLength: 17},
				// padded to byte here
				{value: 0xffffffff, bitLength: 32},
				// padded to byte here
				{value: 0x7fffffff, bitLength: 31},
				{value: 1, bitLength: 1}
			]);

			testBitfieldSetters('Signed', [
				// padded to byte here
				{value: -1, bitLength: 3},
				{value: -2, bitLength: 5},
				// padded to byte here
				{value: -258, bitLength: 15},
				{value: 64000, bitLength: 17},
				// padded to byte here
				{value: -1, bitLength: 32},
				// padded to byte here
				{value: -0x40000000, bitLength: 31},
				{value: -1, bitLength: 1}
			]);
		});

		suite('should be sliced', function () {
			test('with bound check', function () {
				assert.Throw(function () {
					view.slice(5, 10);
				});
			});

			test('as pointer to original data', function () {
				var pointerCopy = view.slice(1, 4);
				compareBytes(pointerCopy.getBytes(), [0xfe, 0xfd, 0xfc]);
				pointerCopy.setChar(0, chr(1));
				assert.equal(view.getChar(1), chr(1));
				pointerCopy.setChar(0, chr(0xfe));
			});

			test('as copy of original data', function () {
				var copy = view.slice(1, 4, true);
				compareBytes(copy.getBytes(), [0xfe, 0xfd, 0xfc]);
				copy.setChar(0, chr(1));
				assert.notEqual(view.getChar(1), chr(1));
			});

			test('with only start offset argument given', function () {
				var pointerCopy = view.slice(1);
				compareBytes(pointerCopy.getBytes(), [0xfe, 0xfd, 0xfc, 0xfa, 0x00, 0xba, 0x01]);
			});

			test('with negative start offset given', function () {
				var pointerCopy = view.slice(-2);
				compareBytes(pointerCopy.getBytes(), [0xba, 0x01]);
			});

			test('with negative end offset given', function () {
				var pointerCopy = view.slice(1, -2);
				compareBytes(pointerCopy.getBytes(), [0xfe, 0xfd, 0xfc, 0xfa, 0x00]);
			});
		});

		test('should be aligned by given count of bytes', function () {
			function checkAlignBy(byteCount, expectedOffset) {
				var offset = view.alignBy(byteCount);
				assert.equal(view._bitOffset, 0);
				assert.equal(view.tell(), offset);
				assert.equal(offset, expectedOffset);
			}

			view.seek(1);
			checkAlignBy(undefined, 1);
			view.getUnsigned(17);
			checkAlignBy(undefined, 4);
			checkAlignBy(3, 6);
		});

		test('Uint64 should have precise toString', function() {
			assert.equal(jDataView.Uint64.fromNumber(123456).toString(), '123456');
			// this is larger than 2^32
			assert.equal(jDataView.Uint64.fromNumber(12345678901).toString(), '12345678901');
			// Number.MAX_SAFE_INTEGER
			assert.equal(jDataView.Uint64.fromNumber(9007199254740992).toString(), '9007199254740992');
			// this is larger than 2^53
			assert.equal(new jDataView.Uint64(12345678, 12345678).toString(), '53024283269292366');
			// 2^64 - 1
			assert.equal(new jDataView.Uint64(Math.pow(2, 32) - 1, Math.pow(2, 32) - 1).toString(), '18446744073709551615');
		});

		test('Int64 should have precise toString', function() {
			assert.equal(jDataView.Int64.fromNumber(-12345).toString(), '-12345');
			// -Number.MAX_SAFE_INTEGER
			assert.equal(jDataView.Int64.fromNumber(-9007199254740992).toString(), '-9007199254740992');

			// Expected values come from Python's bignums:
			// def toString(lo, hi):
			//     return '-' + str(2 ** 32 - lo + 2**32*(2**32 - 1 - hi))

			var pow = function(x) { return Math.pow(2, x); };
			var toStr = function(lo, hi) { return new jDataView.Int64(lo, hi).toString(); };
			assert.equal(toStr(0, pow(32) - 1 - pow(19)), '-2251804108652544');
			assert.equal(toStr(0, pow(32) - pow(19)), '-2251799813685248');

			// -2^63
			assert.equal(toStr(0, pow(31)), '-9223372036854775808');
		});

		if (engineName === 'ArrayBuffer') {
			test('can be used in jDataView from Uint8Array::subarray', function () {
				var bytes = [1, 2, 3],
					offset = 1,
					original = new Uint8Array(bytes),
					view = new jDataView(original.subarray(offset));

				compareBytes(view.getBytes(), bytes.slice(offset));
			});
		}

		test('should be available for testing', function () {
			assert.ok(compatibility[engineName]);
		});
	});
});
