let pecahanAwal = [
  [2000, 7],
  [1000, 1],
  [10000, 3],
  [5000, 4],
  [50000, 1],
  [100000, 1],
  [500, 4],
];

let totalBiaya = 2500;

let pecahanDibayarkan = [[5000, 1]];

function hitungKembalian(totalBiaya, pecahanDibayarkan) {
  let totalDibayarkan = 0;

  for (let i = 0; i < pecahanDibayarkan.length; i++) {
    totalDibayarkan += pecahanDibayarkan[i][0] * pecahanDibayarkan[i][1];
  }

  let kembalian = totalDibayarkan - totalBiaya;

  return kembalian;
}

function tentukanPecahan(jumlahKembalian, pecahanAwal) {
  let pecahanYangDiberikan = [];

  for (let i = 0; i < pecahanAwal.length; i++) {
    let nominal = pecahanAwal[i][0];
    let jumlahAwal = pecahanAwal[i][1];
    let jumlahDiberikan = 0;

    while (jumlahKembalian >= nominal && jumlahAwal > 0) {
      jumlahKembalian -= nominal;
      jumlahAwal--;
      jumlahDiberikan++;
    }

    if (jumlahDiberikan > 0) {
      pecahanYangDiberikan.push([nominal, jumlahDiberikan]);
    }
  }

  return pecahanYangDiberikan;
}

function perbaruiPecahanSetelahTransaksi(
  pecahanAwal,
  pecahanDibayarkan,
  pecahanYangDiberikan
) {
  for (let i = 0; i < pecahanDibayarkan.length; i++) {
    let nominalDibayarkan = pecahanDibayarkan[i][0];
    let jumlahDibayarkan = pecahanDibayarkan[i][1];

    let indeks = pecahanAwal.findIndex((item) => item[0] === nominalDibayarkan);

    if (indeks !== -1) {
      pecahanAwal[indeks][1] += jumlahDibayarkan;
    }
  }

  for (let i = 0; i < pecahanYangDiberikan.length; i++) {
    let nominalDiberikan = pecahanYangDiberikan[i][0];
    let jumlahDiberikan = pecahanYangDiberikan[i][1];

    let indeks = pecahanAwal.findIndex((item) => item[0] === nominalDiberikan);

    if (indeks !== -1) {
      pecahanAwal[indeks][1] -= jumlahDiberikan;
    }
  }
}

let jumlahKembalian = hitungKembalian(totalBiaya, pecahanDibayarkan);

console.log("Jumlah Kembalian:", jumlahKembalian);

let pecahanYangDiberikan = tentukanPecahan(jumlahKembalian, pecahanAwal);
console.log("Pecahan Yang Diberikan:", pecahanYangDiberikan);

perbaruiPecahanSetelahTransaksi(
  pecahanAwal,
  pecahanDibayarkan,
  pecahanYangDiberikan
);
console.log("Pecahan Setelah Transaksi:", pecahanAwal);
