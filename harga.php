<div id="page-wrapper">
    <!-- Main -->
    <div id="main" class="wrapper style1">
        <div class="container">
            <header class="major">
                <h2>Atur Harga BBM</h2>
                <p><?php
                    echo date("l, d F Y");
                    ?></p>
            </header>

            <section>
                <form method="post" action="#">
                    <div class="row gtr-uniform gtr-50">
                        <!-- PERTAMAX -->
                        <div class="col-4 col-12-xsmall">
                        </div>
                        <div class="col-4 col-12-xsmall">
                            <h1>Harga Modal</h1>
                        </div>
                        <div class="col-4 col-12-xsmall">
                            <h1>Harga Jual</h1>
                        </div>
                        <!-- PERTAMAX -->
                        <div class="col-4 col-12-xsmall">
                            <img src="images/pertamax.png" height="64">
                        </div>
                        <div class="col-4 col-12-xsmall">
                            <input type="text" name="modalpertamax" id="modalpertamax" value=<?php echo $pertamax->getModal()?> placeholder="Harga Modal" />
                        </div>
                        <div class="col-4 col-12-xsmall">
                            <input type="text" name="jualpertamax" id="jualpertamax" value=<?php echo $pertamax->getJual()?> placeholder="Harga Jual" />
                        </div>
                        <!-- PERTAMAX TURBO -->
                        <div class="col-4 col-12-xsmall">
                            <img src="images/pertamaxturbo.png" height="64">
                        </div>
                        <div class="col-4 col-12-xsmall">
                            <input type="text" name="modalpertamaxt" id="modalpertamaxt" value=<?php echo $pertamaxt->getModal()?> placeholder="Harga Modal" />
                        </div>
                        <div class="col-4 col-12-xsmall">
                            <input type="text" name="jualpertamaxt" id="jualpertamaxt" value=<?php echo $pertamaxt->getJual()?> placeholder="Harga Jual" />
                        </div>
                        <!-- PERTALITE -->
                        <div class="col-4 col-12-xsmall">
                            <img src="images/pertalite.png" height="64">
                        </div>
                        <div class="col-4 col-12-xsmall">
                            <input type="text" name="modalpertalite" id="modalpertalite" value=<?php echo $pertalite->getModal()?> placeholder="Harga Modal" />
                        </div>
                        <div class="col-4 col-12-xsmall">
                            <input type="text" name="jualpertalite" id="jualpertalite" value=<?php echo $pertalite->getJual()?> placeholder="Harga Jual" />
                        </div>
                        <!-- SOLAR -->
                        <div class="col-4 col-12-xsmall">
                            <img src="images/solar.png" height="64">
                        </div>
                        <div class="col-4 col-12-xsmall">
                            <input type="text" name="modalsolar" id="modalsolar" value=<?php echo $solar->getModal()?> placeholder="Harga Modal" />
                        </div>
                        <div class="col-4 col-12-xsmall">
                            <input type="text" name="jualsolar" id="jualsolar" value=<?php echo $solar->getJual()?> placeholder="Harga Jual" />
                        </div>

                        <div class="col-12">
                            <ul class="actions">
                                <li><input type="submit" value="Ubah Harga" class="primary" name="btnSubmit"/></li>
                                <li><input type="reset" value="Reset" /></li>
                            </ul>
                        </div>
                    </div>
                </form>
            </section>
        </div>
    </div>
</div>