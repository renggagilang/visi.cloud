// Buatlah sebuah fungsi untuk menghitung
// jumlah kata dalam sebuah kalimat.
// Untuk kalimatnya sebagai berikut ini (score : 2)
// Contoh Input : Halo, kami adalah visicloud
// Contoh Output : 4
function wordCount(str) {
  let result = 0;
  for (let i = 0; i < str.length; i++) {
    if (str[i] === " ") {
      result += 1;
    }
  }
  result += 1;
  return result;
}
console.log(wordCount("Halo, kami adalah visicloud"));

fetch("https://storage.googleapis.com/asset-visicloud/public/test/bidang.json")
  .then((response) => response.json())
  .then((data) => {
    const kalimat = data.kalimat;

    const hasil = wordCount(kalimat);

    console.log(hasil);
  })
  .catch((error) => {
    console.error("Error:", error);
  });

// // Buatlah fungsi untuk membalikkan urutan kata dalam kata berikut ini. (score : 2)
// // Contoh Input: "Halo dunia ini"
// // Contoh Output: "ini dunia Halo"

function balikUrutanKata(kalimat) {
  const kataKata = kalimat.split(" ");

  const kalimatTerbalik = kataKata.reverse().join(" ");

  return kalimatTerbalik;
}

let kalimatInput = "Halo dunia ini";
let kalimatOutput = balikUrutanKata(kalimatInput);
console.log(kalimatOutput);

fetch("https://storage.googleapis.com/asset-visicloud/public/test/bidang.json")
  .then((response) => response.json())
  .then((data) => {
    const kalimat = data.kalimat;

    const hasil = balikUrutanKata(kalimat);

    console.log(hasil);
  })
  .catch((error) => {
    console.error("Error:", error);
  });
