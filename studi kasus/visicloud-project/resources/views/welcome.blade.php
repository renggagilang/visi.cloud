<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kasir</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.7/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100">
    <div class="container mx-auto p-4">
        <h1 class="text-3xl font-bold mb-4">Kasir</h1>

        <form method="post" action="{{ route('processTransaction') }}" class="bg-white p-6 rounded-lg shadow-md">
            @csrf
            <div class="mb-4">
                <label for="pecahanAwal" class="text-lg font-semibold">Pecahan Awal:</label>
                <table class="w-full mt-2">
                    <tr>
                        <th class="py-2 px-4">Nominal</th>
                        <th class="py-2 px-4">Jumlah</th>
                    </tr>
                    <tr>
                        <td>2000</td>
                        <td><input type="number" name="pecahanAwal[2000]" value="7" min="0"></td>
                    </tr>
                    <tr>
                        <td>1000</td>
                        <td><input type="number" name="pecahanAwal[1000]" value="1" min="0"></td>
                    </tr>
                    <tr>
                        <td>10000</td>
                        <td><input type="number" name="pecahanAwal[10000]" value="3" min="0"></td>
                    </tr>
                    <tr>
                        <td>5000</td>
                        <td><input type="number" name="pecahanAwal[5000]" value="4" min="0"></td>
                    </tr>
                    <tr>
                        <td>50000</td>
                        <td><input type="number" name="pecahanAwal[50000]" value="1" min="0"></td>
                    </tr>
                    <tr>
                        <td>100000</td>
                        <td><input type="number" name="pecahanAwal[100000]" value="1" min="0"></td>
                    </tr>
                    <tr>
                        <td>500</td>
                        <td><input type="number" name="pecahanAwal[500]" value="4" min="0"></td>
                    </tr>
                </table>
            </div>

            <div class="mb-4">
                <label for="totalBiaya" class="text-lg font-semibold">Total Biaya:</label>
                <input type="number" id="totalBiaya" name="totalBiaya" required class="w-full px-4 py-2 rounded-md border border-gray-300">
            </div>

            <!-- Pecahan Dibayarkan -->
            <div class="mb-4">
                <label for="pecahanDibayarkan" class="text-lg font-semibold">Pecahan Dibayarkan:</label>
                <table class="w-full mt-2">
                    <tr>
                        <th class="py-2 px-4">Nominal</th>
                        <th class="py-2 px-4">Jumlah</th>
                    </tr>
                    <tr>
                        <td>2000</td>
                        <td><input type="number" name="pecahanDibayarkan[2000]" value="0" min="0"></td>
                    </tr>
                    <tr>
                        <td>1000</td>
                        <td><input type="number" name="pecahanDibayarkan[1000]" value="0" min="0"></td>
                    </tr>
                    <tr>
                        <td>10000</td>
                        <td><input type="number" name="pecahanDibayarkan[10000]" value="0" min="0"></td>
                    </tr>
                    <tr>
                        <td>5000</td>
                        <td><input type="number" name="pecahanDibayarkan[5000]" value="0" min="0"></td>
                    </tr>
                    <tr>
                        <td>50000</td>
                        <td><input type="number" name="pecahanDibayarkan[50000]" value="0" min="0"></td>
                    </tr>
                    <tr>
                        <td>100000</td>
                        <td><input type="number" name="pecahanDibayarkan[100000]" value="0" min="0"></td>
                    </tr>
                    <tr>
                        <td>500</td>
                        <td><input type="number" name="pecahanDibayarkan[500]" value="0" min="0"></td>
                    </tr>
                </table>
            </div>

            <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-semibold px-4 py-2 rounded-md">Process</button>
        </form>

        @if(isset($kembalian))
        <!-- Hasil Perhitungan -->
        <div class="mt-6 bg-white p-6 rounded-lg shadow-md">
            <h2 class="text-2xl font-semibold">Hasil Perhitungan:</h2>
            <p class="mt-2">Jumlah Kembalian: {{ $kembalian }}</p>

            <!-- Pecahan Yang Diberikan -->
            <h3 class="text-lg font-semibold mt-4">Pecahan Yang Diberikan:</h3>
            <ul class="list-disc list-inside mt-2">
                @foreach ($pecahanYangDiberikan as $nominal => $jumlah)
                <li>{{ $nominal }} x {{ $jumlah }}</li>
                @endforeach
            </ul>

            <!-- Pecahan Setelah Transaksi -->
            <h3 class="text-lg font-semibold mt-4">Pecahan Setelah Transaksi:</h3>
            <ul class="list-disc list-inside mt-2">
                @foreach ($pecahanAwal as $nominal => $jumlah)
                <li>{{ $nominal }} x {{ $jumlah }}</li>
                @endforeach
            </ul>
        </div>
        @endif
    </div>
</body>

</html>