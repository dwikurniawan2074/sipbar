<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Cetak Permintaan Barang</title>
  <link rel="shortcut icon" href="/Images/bpkp_logo.png" />
</head>

<body>
  <div align="center">
    <div style="width: 1200px">
      <table style="width: 1100px">
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


      <div align="center">
        <table width="1200px">
          <tbody>
            <tr>
              <td align="center">
                <font size="4"><strong>Laporan Permintaan Barang</strong></font>
              </td>
            </tr>
            <br>

            <table width="100%">
              <tbody>
                <tr>
                  <td width="50%"></td>
                  <td width="50%"></td>
                </tr>
                <tr>
                  <td style="padding-left: 24px;">
                    NIP&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?= session()->get('nip'); ?>
                  </td>
                  <?php if (session()->get('id_bidang') == "1") { ?>
                    <td>Bidang : Instansi Pemerintah Pusat</td>
                  <?php } else if (session()->get('id_bidang') == "2") { ?>
                    <td>Bidang : APD</td>
                  <?php } else if (session()->get('id_bidang') == "3") { ?>
                    <td>Bidang : Akuntan Negara</td>
                  <?php } else if (session()->get('id_bidang') == "4") { ?>
                    <td>Bidang : Keuangan</td>
                  <?php } else if (session()->get('id_bidang') == "5") { ?>
                    <td>Bidang : Kearsipan</td>
                  <?php } else if (session()->get('id_bidang') == "6") { ?>
                    <td>Bidang Investigasi</td>
                  <?php } else if (session()->get('id_bidang') == "7") { ?>
                    <td>Bidang : Umum</td>
                  <?php } ?>
                </tr>
                <tr>
                  <td></td>
                  <td></td>
                </tr>
                <tr>
                  <td style="padding-left: 24px;">Nama Pegawai : <?= session()->get('nama_pegawai'); ?> </td>
                  <td></td>
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
        <table class="tb_data" width="1150px" border="1" bordercolor="black" cellspacing="0" cellpadding="3">
          <tbody>
            <tr align="center" height="10" style="">
              <td class="HeaderBG">
                <font size="-1">No</font>
              </td>
              <td class="HeaderBG">
                <font size="-1">Nama Barang</font>
              </td>
              <td class="HeaderBG">
                <font size="-1">Jumlah Permintaan</font>
              </td>
              <td class="HeaderBG">
                <font size="-1">Jumlah Disetujui</font>
              </td>
              <!-- <td class="HeaderBG">
                <font size="-1">NIP<br /></font>
              </td> -->
              <!-- <td class="HeaderBG">
                <font size="-1">Satuan</font>
              </td> -->
              <td class="HeaderBG">
                <font size="-1">Tanggal Permintaan</font>
              </td>
              <td class="HeaderBG">
                <font size="-1">Tanggal Disetujui</font>
              </td>
              <td class="HeaderBG">
                <font size="-1">Status</font>
              </td>
            </tr>
            <?php
            $no = 1;
            foreach ($permintaan as $pr) :
            ?>
              <?php
              if ($pr['nip'] == session()->get('nip')) {  ?>
              <?php $tanggalPermintaan = new DateTime($pr['tanggal_permintaan']); ?>
                <?php if (($tanggalPermintaan >= $tanggalawal) && ($tanggalPermintaan <= $tanggalakhir)) { ?>
                <tr valign="top" class="AlternateBG" style="font-size: 10pt">
                  <td align="center"><?= $no; ?></td>
                  <td align="center"><?= $pr['nama_barang']; ?></td>
                  <td align="center"><?= $pr['jumlah_permintaan']; ?> <?= $pr['satuan'] ?></td>
                  <td align="center"><?= $pr['jumlah_disetujui']; ?> <?= $pr['satuan'] ?></td>
                  <td align="center"><?= $pr['tanggal_permintaan']; ?></td>
                  <td align="center"><?= $pr['tanggal_disetujui'] ?></td>
                  <?php if ($pr['status'] == "0") { ?>
                    <td align="center">Tidak Disetujui</td>
                  <?php } else if ($pr['status'] == "1") { ?>
                    <td align="center">On Process</td>
                  <?php }
                  if ($pr['status'] == "2") { ?>
                    <td align="center">Disetujui</td>
                  <?php } ?>
                <?php } ?>
              <?php $no++;
              }
            endforeach;
              ?>
          </tbody>
        </table>
        <br>
        <table width="100%" class="footer-table">
          <tbody>
            <tr>
              <td width="50%"></td>
              <td width="50%">Bandar Lampung,
                <!-- fungsi tanggal format indonesia -->
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
                }

                echo tanggal_indonesia(date('Y-m-d')); ?>
              </td>
            </tr>
            <tr>
              <td></td>
              <td></td>
            </tr>
            <tr>
              <td style="padding-left: 24px;">Mengetahui</td>
              <td>Pengelola Pengadaan Barang/Jasa Muda
              </td>
            </tr>
            <tr>
              <?php if (session()->get('id_bidang') == "1") { ?>
                <td style="padding-left: 24px;">Bidang Instansi Pemerintah Pusat</td>
              <?php } else if (session()->get('id_bidang') == "2") { ?>
                <td style="padding-left: 24px;">Bidang APD</td>
              <?php } else if (session()->get('id_bidang') == "3") { ?>
                <td style="padding-left: 24px;">Bidang Akuntan Negara</td>
              <?php } else if (session()->get('id_bidang') == "4") { ?>
                <td style="padding-left: 24px;">Bidang Keuangan</td>
              <?php } else if (session()->get('id_bidang') == "5") { ?>
                <td style="padding-left: 24px;">Bidang Kearsipan</td>
              <?php } else if (session()->get('id_bidang') == "6") { ?>
                <td style="padding-left: 24px;">Bidang Investigasi</td>
              <?php } else if (session()->get('id_bidang') == "7") { ?>
                <td style="padding-left: 24px;">Bidang Umum</td>
              <?php } ?>
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
              <td style="padding-left: 24px;">NIP.</td>
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
  <script>
    window.print()
  </script>
</body>

</html>