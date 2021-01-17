<script>
    $(document).ready(function() {
        $('#transaksiTable').DataTable();
    });

    var harga = 0;
    var banyak = 0;
    var total = 0;
    var potongan = 0;
    var subtotal = 0;
    var pakaiPoin = false;
    var point = 0;
    var maxPoin = 0;

    function fungsiBbm(selectedObject) {
        var bbmid = selectedObject.value;
        if (bbmid == 1) {
            harga = <?php echo $pertamax->getJual() ?>;
        } else if (bbmid == 2) {
            harga = <?php echo $pertamaxt->getJual() ?>;
        } else if (bbmid == 3) {
            harga = <?php echo $pertalite->getJual() ?>;
        } else if (bbmid == 4) {
            harga = <?php echo $solar->getJual() ?>;
        }
        document.getElementById("harga").setAttribute("value", harga + "/liter");
        fungsiKuantitas(banyak);
        setTotal();
    }

    function fungsiKuantitas(_banyak) {
        banyak = _banyak;
        total = harga * banyak;
        document.getElementById("total").setAttribute("value", total);
        setTotal();
    }

    function fungsiTotal(_total) {
        total = _total;
        banyak = total / harga;
        document.getElementById("kuantitas").setAttribute("value", banyak);
        setTotal();
        //alert(banyak + total + harga);
    }

    function fungsiPoint(_point) {
        point = _point;
        potongan = (point / 150) * 10000;
        document.getElementById("potongan").setAttribute("value", potongan);
        setTotal();
    }

    function setTotal() {
        subtotal = total - potongan;
        document.getElementById("subtotal").setAttribute("value", subtotal);
        //alert("subtotal: "+subtotal+" potongan: "+potongan);
    }
</script>

<div id="page-wrapper">
    <!-- Main -->
    <div id="main" class="wrapper style1">
        <div class="container">
            <header class="major">
                <h2>Transaksi</h2>
                <p>Beli BBM</p>
            </header>

            <section>
                <h3>Form</h3>
                <form method="post" action="#">
                    <div class="row gtr-uniform gtr-50">
                        <!-- <div class="col-12">
                            <input type="text" name="member" id="member" value="" placeholder="Member" />
                        </div> -->
                        <div class="col-12 col-12-xsmall">
                            <select name="member" id="member" placeholder="Member" onchange="fungsiGantiMember(this.value)">
                                <option value="">- Member -</option>
                                <?php
                                foreach ($members as $member) {
                                    echo "<option value='" . $member->getId() . "'>"  . $member->getId() . '-' . $member->getNama() . "</option>";
                                }
                                ?>
                            </select>
                        </div>
                        <div class="col-4 col-12-xsmall">
                            <select name="jenisbbm" id="jenisbbm" onchange="fungsiBbm(this)" required>
                                <option value="">- Jenis BBM -</option>
                                <option value="1">Pertamax</option>
                                <option value="2">Pertamax Turbo</option>
                                <option value="3">Pertalite</option>
                                <option value="4">Solar</option>
                            </select>
                        </div>
                        <div class="col-4 col-12-xsmall">
                            <input type="text" name="harga" id="harga" value="" placeholder="Harga/L" disabled />
                        </div>
                        <div class="col-4 col-12-xsmall">
                            <input type="text" name="kuantitas" id="kuantitas" value="" placeholder="Kuantitas (L)" onchange="fungsiKuantitas(this.value)" required/>
                        </div>
                        <div class="col-12">
                            <input type="text" name="total" id="total" value="" placeholder="Total" onchange="fungsiTotal(this.value)" required/>
                        </div>
                        <div class="col-3 col-12-medium">
                            <input type="checkbox" id="tukarpoint" name="tukarpoint">
                            <label for="tukarpoint">Tukar Point</label>
                        </div>
                        <div class="col-3 col-12-xsmall">
                            <input type="number" name="npotongan" id="npotongan" value="" step=150 min=0 max=1500 onchange="fungsiPoint(this.value)" />
                        </div>
                        <div class="col-6 col-12-medium">
                            <input type="text" name="potongan" id="potongan" value="" placeholder="Potongan" />
                        </div>
                        <div class="col-12">
                            <input type="text" name="subtotal" id="subtotal" value="" placeholder="Subtotal" />
                        </div>
                        <div class="col-12">
                            <ul class="actions">
                                <li><input type="submit" value="Bayar" class="primary" name="btnSubmit" /></li>
                                <li><input type="reset" value="Reset" /></li>
                            </ul>
                        </div>
                    </div>
                </form>
                <h3>Transaksi Terakhir</h3>
                <div class="table-wrapper">
                    <table class="alt" id="transaksiTable">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Tanggal</th>
                                <th>Customer</th>
                                <th>Jenis BBM</th>
                                <th>Banyak</th>
                                <th>Harga</th>
                                <th>Total</th>
                                <th>Potongan</th>
                                <th>Subtotal</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($transaksipegawais as $tp) {
                            ?>
                                <tr>
                                    <td><?php echo $tp->getId() ?></td>
                                    <td><?php echo $tp->getTanggal() ?></td>
                                    <td><?php echo $tp->getNamamember() ?></td>
                                    <td><?php echo $tp->getJenis() ?></td>
                                    <td><?php echo $tp->getBanyak() ?></td>
                                    <td><?php echo "Rp " . number_format($tp->getHarga(), 2, ",", ".")  ?></td>
                                    <td><?php echo "Rp " . number_format($tp->getTotal(), 2, ",", ".") ?></td>
                                    <td><?php echo "Rp " . number_format($tp->getPotongan(), 2, ",", ".") ?></td>
                                    <td><?php echo "Rp " . number_format($tp->getSubtotal(), 2, ",", ".") ?></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </section>
        </div>
    </div>
</div>