<?php

class Cart extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('M_cart');
    }

    function index()
    {
        $data['data'] = $this->M_cart->get_all_barang();
        $title = array(
            'title' => 'jogjaCam Pusatnya Aksesoris Kamera'
        );


        $this->load->view('shared/frontheader', $title);
        $this->load->view('front/cart_view', $data);
    }

    function add_to_cart()
    { //fungsi Add To Cart
        $data = array(
            'id' => $this->input->post('barang_id'),
            'name' => $this->input->post('barang_nama'),
            'price' => $this->input->post('barang_harjul'),
            'qty' => $this->input->post('quantity'),
        );
        $this->cart->insert($data);
        echo $this->show_cart(); //tampilkan cart setelah added
    }

    function show_cart()
    { //Fungsi untuk menampilkan Cart
        $output = '';
        $no = 0;
        foreach ($this->cart->contents() as $items) {
            $no++;
            $output .= '
                <tr>
                    <td>' . $items['name'] . '</td>
                    <td>' . number_format($items['price']) . '</td>
                    <td>' . $items['qty'] . '</td>
                    <td>' . number_format($items['subtotal']) . '</td>
                    <td><button type="button" id="' . $items['rowid'] . '" class="hapus_cart btn btn-danger btn-xs">Batal</button></td>
                </tr>
            ';
        }
        $output .= '
            <tr>
                <th colspan="3">Total</th>
                <th colspan="2">' . 'Rp ' . number_format($this->cart->total()) . '</th>
            </tr>
        ';
        return $output;
    }

    function load_cart()
    { //load data cart
        echo $this->show_cart();
    }

    function hapus_cart()
    { //fungsi untuk menghapus item cart
        $data = array(
            'rowid' => $this->input->post('row_id'),
            'qty' => 0,
        );
        $this->cart->update($data);
        echo $this->show_cart();
    }

    function pemesanan()
    {
        if ($this->session->userdata("logged_in")) {
            $data['data'] = $this->M_cart->get_all_barang();
            $data['bank'] = $this->M_cart->get_all_bank();
            $title = array(
                'title' => 'jogjaCam Pusatnya Aksesoris Kamera'
            );

            $this->load->view('shared/frontheader', $title);
            $this->load->view('front/pemesanan_view', $data);
        } else {
            redirect('login');
        }
    }

    function proses_pemesanan()
    {
        if ($this->session->userdata("logged_in")) {
            $nama = $this->input->post('nama');
            $nohp = $this->input->post('nohp');
            $tujuan = $this->input->post('tujuan');
            $bank = $this->input->post('pembayaran');
            $date = date('y-m-d');
            $status = 'pending';
            $total = $this->cart->total();
            $nofak = $this->M_cart->get_nofak();
            $this->session->set_userdata('nofak', $nofak);
            $order_proses = $this->M_cart->proses_pemesanan($nofak, $total, $nama, $nohp, $tujuan, $bank, $date, $status);
            if ($order_proses) {
                $this->cart->destroy();
                $this->session->unset_userdata('tglfak');
                $this->session->unset_userdata('suplier');
                echo $this->session->set_flashdata('msg', 'suksespesan');
                redirect('pemesanan_pelanggan');
            } else {
                redirect('home');
            }
        } else {
            redirect('login');
        }
    }
}
