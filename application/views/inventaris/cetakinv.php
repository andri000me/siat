<?php
            $pdf = new Pdf('P', 'mm', 'A4', true, 'UTF-8', false);
            $pdf->SetTitle('Detail Inventais');
            $pdf->SetHeaderMargin(30);
            $pdf->SetTopMargin(20);
            $pdf->setFooterMargin(20);
            $pdf->SetAutoPageBreak(true);
            $pdf->SetAuthor('Author');
            $pdf->SetDisplayMode('real', 'default');
            $pdf->AddPage();
            $i=0;
            $html='<h3>Detail inventaris</h3>
                    <table cellspacing="1" bgcolor="#666666" cellpadding="2">
                        <tr bgcolor="#ffffff">
                            <th width="5%" align="center">No</th>
                            <th width="8%" align="center">faktur</th>
                            <th width="10%" align="center">Nama</th>
                            <th width="10%" align="center">Uraian</th>
                            <th width="5%" align="center">Kw</th>
                            <th width="10%" align="center">Tanggal Perolehan</th>
                            <th width="10%" align="center">Asal Barang</th>
                            <th width="10%" align="center">Keadaan</th>
                            <th width="10%" align="center">Harga</th>
                            <th width="15%" align="center">Keterangan</th>
                        </tr>';
            foreach ($inventaris as $row) 
                {
                    $i++;
                    $html.='<tr bgcolor="#ffffff">
                            <td align="center">'.$i.'</td>
                            <td>'.$row['no_inventaris']. '</td>
                            <td>'.$row['nama'].'</td>
                            <td>'.$row['uraian'].'</td>
                            <td>'.$row['kwantitas'].'</td>
                            <td>'.$row['tgl_perolehan'].'</td>
                            <td>'.$row['asal_barang'].'</td>
                            <td>'.$row['keadaan'].'</td>
                            <td align="right">'.number_format($row['harga'],0,",",",").'</td>
                            <td>'.$row['keterangan'].'</td>
                        </tr>';
                }
            $html.='</table>';
            $pdf->writeHTML($html, true, false, true, false, '');
            $pdf->Output('Detail_Inventaris.pdf', 'I');
?>