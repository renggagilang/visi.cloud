const nilai = {
  satu: 1,
  dua: 2,
  tiga: 3,
  empat: 4,
  lima: 5,
  enam: 6,
  tujuh: 7,
  delapan: 8,
  sembilan: 9,
  sepuluh: 10,
  sebelas: 11,
};
// Buatlah sebuah fungsi . (score : 2)
// Contoh Input: [tujuh,dua,lima,satu,sembilan,tiga]
// Contoh Output: [satu,dua,tiga,lima,tujuh,sembilan]

function urutkanArray(array) {
  array.sort(function (a, b) {
    return nilai[a] - nilai[b];
  });
  return array;
}
let input = ["tujuh", "dua", "lima", "satu", "sembilan", "tiga"];
let outputArray = urutkanArray(input);
console.log(outputArray);

// // Buatlah sebuah fungsi  (score : 2)
// // Contoh Input: [delapan, sebelas,dua,lima,satu, enam, sepuluh]
// // Contoh Output: min : satu , maks : sepuluh
function findMinMax(array) {
  if (array.length === 0) {
    return "Array kosong.";
  }

  let min = array[0];
  let max = array[0];

  for (let i = 1; i < array.length; i++) {
    if (nilai[array[i]] < nilai[min]) {
      min = array[i];
    }
    if (nilai[array[i]] > nilai[max]) {
      max = array[i];
    }
  }

  return `min: ${min} , maks: ${max}`;
}

let inputArray = [
  "delapan",
  "sebelas",
  "dua",
  "lima",
  "satu",
  "enam",
  "sepuluh",
];
let result = findMinMax(inputArray);
console.log(result);
