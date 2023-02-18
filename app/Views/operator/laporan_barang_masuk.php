<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Cetak Laporan Barang</title>
    <link rel="shortcut icon" href="/Images/bpkp_logo.png" />
</head>

<body>
    <div align="center">
        <div style="width: 900px">
            <table style="width: 800px">
                <tbody>
                    <tr>
                        <td style="width: 15%; " align="center">
                            <img src="/Images/bpkp_logo.png" width="100%" height="60" />
                        </td>
                        <td align="center">
                            <p>
                                <strong style="font-size: 15pt">BADAN PENGAWASAN KEUANGAN DAN PEMBANGUNAN</strong>
                            </p>
                            <p>
                                <strong style="font-size: 15pt">PERWAKILAN PROVINSI LAMPUNG</strong>
                            </p>
                            <p>
                                Jl. Basuki Rahmat Nomor 33, Bandar Lampung. 35215.<br />
                                Telp/Fax : (0721) 481550 / (0721) 481550<br />
                            </p>
                        </td>
                    </tr>
                </tbody>
            </table>
            <hr style="border: 0; border-top: 5px double #8c8c8c; margin-top: 0" />
            <meta http-equiv="content-type" content="text/html;charset=iso-8859-1" />
            <link rel="icon" type="img/png" href="https://siakadu.unila.ac.id/assets/v1/img/logo_unila.png" sizes="16x16" />

            <?php

            function tanggal_indonesia($tanggal)
            {

                $bulan = array(
                    1 =>     'Januari',
                    'Februari',
                    'Maret',
                    'April',
                    'Mei',
                    'Juni',
                    'Juli',
                    'Agustus',
                    'September',
                    'Oktober',
                    'November',
                    'Desember'
                );

                $var = explode('-', $tanggal);

                return $var[2] . ' ' . $bulan[(int)$var[1]] . ' ' . $var[0];
                // var 0 = tanggal
                // var 1 = bulan
                // var 2 = tahun
            } ?>

            <div align="center">
                <table width="900px">
                    <tbody>
                        <tr>
                            <td align="center">
                                <font size="4"><strong>Laporan Stok Barang</strong></font>
                            </td>
                        </tr>

                        <table width="100%">
                            <tbody>
                                <tr>
                                    <td width="50%"></td>
                                    <td width="50%"></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>&nbsp;</td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>Dari Tanggal : <?php echo tanggal_indonesia($tglawal); ?></td>
                                    <td>Sampai Tanggal : <?php echo tanggal_indonesia($tglakhir); ?> </td>
                                </tr>
                            </tbody>
                        </table>

                    </tbody>
                </table>
                <br />
                <table class="" width="900px" cellpadding="0" style="margin-bottom: 10pt;">
                    <tbody>
                        <tr>
                        </tr>
                    </tbody>
                </table>
                <table class="tb_data" width="900px" border="1" bordercolor="black" cellspacing="0" cellpadding="3">
                    <tbody>
                        <tr align="center" height="10" style="">
                            <td class="HeaderBG">
                                <font size="-1">No</font>
                            </td>
                            <td class="HeaderBG">
                                <font size="-1">Kode Barang<br /></font>
                            </td>
                            <td class="HeaderBG">
                                <font size="-1">Nama Barang</font>
                            </td>
                            <td class="HeaderBG">
                                <font size="-1">Stok Masuk</font>
                            </td>
                            <td class="HeaderBG">
                                <font size="-1">Tanggal</font>
                            </td>
                        </tr>
                        <?php
                        $no = 1;
                        foreach ($barang->getResult() as $key => $br) : ?>
                            <?php $tanggalBarangMasuk = new DateTime($br->tanggal_barangMasuk); ?>
                            <?php if (($tanggalBarangMasuk >= $tanggalawal) && ($tanggalBarangMasuk <= $tanggalakhir)) { ?>
                                <tr valign="top" class="AlternateBG" style="font-size: 10pt">
                                    <td align="center"><?= $no ?></td>
                                    <td align="center"><?= $br->kode_barang ?></td>
                                    <td align="center"><?= $br->nama_barang ?></td>
                                    <td align="center"><?= $br->jumlah_barangMasuk ?> <?= $br->satuan ?></td>
                                    <td align="center">
                                        <?php if ($br->tanggal_barangMasuk == '') { ?>
                                            &nbsp;
                                        <?php } else { ?>
                                            <?php echo tanggal_indonesia($br->tanggal_barangMasuk); ?>
                                        <?php } ?>
                                    </td>
                                </tr>
                        <?php $no++;
                            }
                        endforeach;
                        ?>
                    </tbody>
                </table>
                <br />
                <table width="100%" class="footer-table">
                    <tbody>
                        <tr>
                            <td width="50%"></td>
                            <td width="50%">Bandar Lampung,
                                <!-- fungsi tanggal format indonesia -->
                                <?php echo tanggal_indonesia(date('Y-m-d')); ?>
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>Pengelola Pengadaan Barang/Jasa Muda
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>Subkoordinator Pengelola Barang Milik Negara, Rumah Tangga dan Kearsipan
                            </td>
                        </tr>

                        <tr>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                        </tr>
                        <tr>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                        </tr>
                        <tr>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                        </tr>
                        <tr>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                        </tr>

                        <tr>
                            <td></td>
                            <td>Sutisna</td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>NIP. 196607051990031001</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div style="page-break-after: always"></div>

            <style>
                table.tb_identity {
                    text-transform: uppercase;
                    font-size: 12px;
                    margin-top: 10px;
                    margin-bottom: 12px;
                }

                table.tb_title {
                    border: 1px solid;
                    margin-bottom: 12px;
                }

                table.tb_data th,
                td {
                    vertical-align: middle;
                }

                table.tb_acc {
                    margin-top: 20px;
                }
            </style>
        </div>
    </div>
    <!-- <script>
    window.print()
  </script> -->
</body>

</html>