            <div class="col-md-9">

                <div class="row">
                    <div class="col-lg-12">
                        <ol class="breadcrumb">
                            <li>
                                <b>Cara Pembelian</b>
                            </li>
                        </ol>
                    </div>
                </div>

                <div class="row">
                	<?php $cara_pembelian = $this->m_home->tampil_cara_pembelian();?>
                    <p>
                    	<?=$cara_pembelian['isi'];?>
                    </p>
                </div>

            </div>


