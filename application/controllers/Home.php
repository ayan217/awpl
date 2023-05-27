<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Home extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('CartModel');
		$this->load->model('ProductModel');
		$this->load->model('OrderModel');
	}
	public function index()
	{
		$data['folder'] = 'frontend';
		$data['template'] = 'index';
		if (user_login_check() == true) {
			$user_type = logged_in_user_row()->type;
			$dpot_id = logged_in_user_row()->dpot_id;
			if ($user_type == '3') {
				$data['products'] = $this->ProductModel->get_products_for_gen(4);
			} else {
				$data['products'] = $this->ProductModel->getproductbydpot($dpot_id, 4);
			}
		} else {
			$data['products'] = $this->ProductModel->getproductbydpot(null, 4, null);
		}
		$data['title'] = 'AWPL';
		$this->load->view('layout', $data);
	}
	public function shop_now()
	{
		if (user_login_check() == true) {
			$user_type = logged_in_user_row()->type;
			$dpot_id = logged_in_user_row()->dpot_id;
			if ($user_type == '3') {
				$data['products'] = $this->ProductModel->get_products_for_gen();
			} else {
				$data['products'] = $this->ProductModel->getproductbydpot($dpot_id);
			}
		} else {
			$data['products'] = $this->ProductModel->getproductbydpot(null, null, null);
		}
		$data['folder'] = 'frontend';
		$data['template'] = 'shop';
		$data['title'] = 'AWPL Shop';
		$this->load->view('layout', $data);
	}
	public function product($id)
	{
		$product_row = $this->ProductModel->getproduct($id);
		$product_type = $product_row->type;
		if (user_login_check() == true) {
			$dpot_id = logged_in_user_row()->dpot_id;
			$user_id = logged_in_user_row()->id;
			$data['products'] = $this->ProductModel->getproductbydpot($dpot_id, null, $product_type);
			$data['product_rate'] = $this->ProductModel->getproductcalculateddetails($id, $user_id);
		} else {
			$data['products'] = $this->ProductModel->getproductbydpot(null, null, $product_type);
		}
		// var_dump($data['product_rate']);die;
		$data['product'] = $product_row;
		$data['folder'] = 'frontend';
		$data['template'] = 'product';
		$data['title'] = 'AWPL Shop';
		$this->load->view('layout', $data);
	}
	public function cart()
	{
		if ($this->input->post()) {
			if (user_login_check() == true) {
				$user_id = logged_in_user_row()->id;
				$_POST['user_id'] = $user_id;
				$_POST['created_at'] = date('Y-m-d H:i:s');
				$product_row = $this->ProductModel->getproduct($_POST['product_id']);
				if ($product_row->in_stock == 0) {
					$_POST['status'] = 0;
					$chk_prev = $this->db->query('SELECT * FROM `cart` WHERE user_id = ' . $user_id . ' AND status = 0 AND product_id = ' . $_POST['product_id'])->row();
					if (empty($chk_prev)) {
						if ($this->CartModel->add($_POST)) {
							$this->session->set_flashdata('log_suc', 'Added');
							redirect($_SERVER['HTTP_REFERER'], 'refresh');
						}
					} else {
						$c_id = $chk_prev->id;
						$c_qnty = $chk_prev->qnty;
						$_POST['qnty'] = $c_qnty + $_POST['qnty'];
						if ($this->CartModel->update($_POST, $c_id)) {
							$this->session->set_flashdata('log_suc', 'Added');
							redirect($_SERVER['HTTP_REFERER'], 'refresh');
						}
					}
				} else {
					$_POST['status'] = 1;
					$chk_prev = $this->db->query('SELECT * FROM `cart` WHERE user_id = ' . $user_id . ' AND status = 1 AND product_id = ' . $_POST['product_id'])->row();
					if (empty($chk_prev)) {
						if ($this->CartModel->add($_POST)) {
							$this->session->set_flashdata('log_err', 'Out of stock..!! Try again after some time.');
							redirect($_SERVER['HTTP_REFERER'], 'refresh');
						}
					} else {
						$c_id = $chk_prev->id;
						$c_qnty = $chk_prev->qnty;
						$_POST['qnty'] = $c_qnty + $_POST['qnty'];
						if ($this->CartModel->update($_POST, $c_id)) {
							$this->session->set_flashdata('log_err', 'Out of stock..!! Try again after some time.');
							redirect($_SERVER['HTTP_REFERER'], 'refresh');
						}
					}
				}
			} else {
				redirect('login');
			}
		} else {
			if (user_login_check() == true) {
				$data['cart_data'] = $this->CartModel->getcart(logged_in_user_row()->id);
				$data['folder'] = 'frontend';
				$data['template'] = 'cart';
				$data['title'] = 'AWPL Cart';
				$this->load->view('layout', $data);
			} else {
				redirect('login');
			}
		}
	}
	public function delete_cart($id)
	{
		if ($this->CartModel->delete($id)) {
			$this->session->set_flashdata('log_suc', 'Removed');
			redirect($_SERVER['HTTP_REFERER'], 'refresh');
		}
	}
	public function update_cart($id)
	{
		$data = [
			'qnty' => $_POST['qnty']
		];
		if ($this->CartModel->update($data, $id) == true) {
			$res = array('status' => 1);
		} else {
			$res = array('status' => 0);
		}
		echo json_encode($res);
	}
	public function login()
	{
		if ($this->input->post()) {
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			//0 means non admin 1 means admin
			if ($nameExist = $this->UserModel->checkUsernameExist($username, 0)) {
				if (password_verify($password, $nameExist->password)) {
					$sess_array = array(
						'user_log_id'  => $nameExist->id,
						'user_display' => $nameExist->username
					);
					$this->session->set_userdata('user_log_data', $sess_array);
					redirect(BASE_URL, 'refresh');
				} else {
					$this->session->set_flashdata('log_err', 'Invalid Password !!');
					redirect($_SERVER['HTTP_REFERER']);
				}
			} else {
				$this->session->set_flashdata('log_err', 'Invalid Username !!');
				redirect($_SERVER['HTTP_REFERER']);
			}
		} else {
			$data['folder'] = 'frontend';
			$data['template'] = 'login';
			$data['title'] = 'AWPL Login';
			$this->load->view('layout', $data);
		}
	}
	public function signup()
	{
		$this->load->model('DpotModel');
		if ($this->input->post()) {
			$this->form_validation->set_rules('full_name', 'Full Name', 'required');
			$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
			if ($_POST['type'] == 3) {
				$this->form_validation->set_rules('username', 'Username', 'required|is_unique[user.username]');
				$this->form_validation->set_rules('password', 'Password', 'required|min_length[8]');
				$_POST['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);
				$_POST['status'] = 1;
			} else {
				$this->form_validation->set_rules('type', 'Distributor Type', 'required');
				$this->form_validation->set_rules('dpot_id', 'Depot', 'required');
				$this->form_validation->set_rules('phone', 'Phone Number', 'required');
				$this->form_validation->set_rules('l_name', 'License Name', 'required');
				$this->form_validation->set_rules('l_number', 'License Number', 'required');
				$this->form_validation->set_rules('l_vdate', 'License Validity Date', 'required');
				$this->form_validation->set_rules('dist', 'District', 'required');
				$this->form_validation->set_rules('city', 'City', 'required');
				$this->form_validation->set_rules('address', 'Address', 'required');
				$this->form_validation->set_rules('moq', 'Minimum Order Quantity ', 'required');
				$this->form_validation->set_rules('v_type', 'Vehicle Type', 'required');
				$this->form_validation->set_rules('v_number', 'Vehicle No', 'required');
				$_POST['status'] = 0;
			}
			if ($this->form_validation->run() == true) {
				if ($_POST['type'] !== 3) {

					if (!empty($_FILES['file']['name'])) {
						$_FILES['file']['name'] = $_FILES['file']['name'];
						$_FILES['file']['type'] = $_FILES['file']['type'];
						$_FILES['file']['tmp_name'] = $_FILES['file']['tmp_name'];
						$_FILES['file']['error'] = $_FILES['file']['error'];
						$_FILES['file']['size'] = $_FILES['file']['size'];
						$file_extension = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
						$filename = str_replace(' ', '_', $_POST['full_name']) . '_contract_agreement.' . $file_extension;
						$uploadPath = UPLOAD_PATH . 'agreements';
						$config['upload_path'] = $uploadPath;
						$config['allowed_types'] = 'pdf';
						$config['max_size'] = 0;
						$config['file_name'] = $filename;
						$this->upload->initialize($config);
						if ($this->upload->do_upload('file')) {
							$_POST['agreement_file'] = $filename;
						} else {
							$res = array('status' => 0, 'error' => $this->upload->display_errors());
							echo json_encode($res);
							die;
						}
					}
				}
				$data = $_POST;
				$user_id = $this->UserModel->add_user($data);
				if ($user_id !== false) {
					$this->session->set_flashdata('log_suc', '');
					$res = array('status' => 1);
				} else {
					$res = array('status' => 0, 'error' => 'Something Went Wrong..!!');
				}
			} else {
				$res = array('status' => 0, 'error' => validation_errors());
			}
			echo json_encode($res);
		} else {
			$data['folder'] = 'frontend';
			$data['template'] = 'signup';
			$data['depos'] = $this->DpotModel->getdepots();
			$data['title'] = 'AWPL Signup';
			$this->load->view('layout', $data);
		}
	}
	public function payment($link_code)
	{
		$explode = explode('-', $link_code);
		$user_id = $explode[1];
		$user_row = $this->UserModel->getanyuser($user_id);
		$data['amount'] = $user_row->sdepo;
		$data['user_id'] = $user_id;
		$data['folder'] = 'frontend';
		$data['template'] = 'payment';
		$data['title'] = 'AWPL Payment';
		$this->load->view('layout', $data);
	}
	public function complete_payment($id)
	{
		$data = [
			'sdepo_status' => 1
		];
		if ($this->UserModel->update_user($data, $id) == true) {
			$user_row = $this->UserModel->getanyuser($id);
			//send mail to the user with username and password
			if ($_SERVER['SERVER_NAME'] == 'localhost' || $_SERVER['HTTP_HOST'] == 'localhost') {
				// code to run if server is localhost
			} else {
				$username = $user_row->username;
				$to_mail = $user_row->email;
				$subject = 'LOGIN - AWPL';
				$msg = '<div>Username: ' . $username . '</div><div>Password: ' . $username . '</div><a href="' . base_url('login') . '">' . base_url('login') . '</a>';
				$this->multipleNeedsModel->mail($to_mail, $subject, $msg);
			}
			//mail end
			$this->session->set_flashdata('log_suc', 'Success');
			redirect('login');
		} else {
			$this->session->set_flashdata('log_err', 'Error');
			redirect($_SERVER['HTTP_REFERER'], 'refresh');
		}
	}
	public function logout()
	{
		$this->session->sess_destroy();
		redirect(BASE_URL, 'refresh');
	}
	public function checkout()
	{
		if ($this->input->post('checkout')) {
			$total = $this->input->post('total');
			if ($total > 0) {
				$dpot_id = $this->input->post('dpot_id');
				$data['amount'] = $total;
				$data['dpot_id'] = $dpot_id;
				$data['folder'] = 'frontend';
				$data['template'] = 'checkout';
				$data['title'] = 'AWPL Checkout';
				$this->load->view('layout', $data);
			} else {
				redirect($_SERVER['HTTP_REFERER']);
			}
		} elseif ($this->input->post('checkout_p')) {
			$cart_items = $this->CartModel->getcart(logged_in_user_row()->id);
			$html = '';
			foreach ($cart_items as $orderlist) {
				$product_data = $this->ProductModel->getproductcalculateddetails($orderlist->product_id, $orderlist->user_id);
				$product_row = $this->ProductModel->getproduct($orderlist->product_id);
				$product_type = $product_row->type;

				$data = [
					'product_id' => $orderlist->product_id,
					'qnty' => $orderlist->qnty,
					'price' => $product_data['total_product_price'],
				];
				$orderlist_id = $this->OrderModel->add2($data);

				$html .= '<div>';
				$html .= 'Name: ' . $product_row->name;
				$html .= 'Price: ' . CURRENCY . ' ' . $product_data['actual_price'];
				$html .= 'Discount: '  . CURRENCY . ' ' . $product_data['discount'];
				$html .= 'Net Amount: '  . CURRENCY . ' ' . $product_data['net_amount'];
				if ($product_type == '1') {
					$html .= 'Excise Duty: '  . CURRENCY . ' ' . $product_data['exc_am'];
				} else {
					$html .= 'TDS: '  . CURRENCY . ' ' . $product_data['tds_amount'];
				}
				$html .= 'Amount: '  . CURRENCY . ' ' . $product_data['total_product_price'];
				$html .= 'Quantity: '  . $orderlist->qnty;
				$html .= 'Total: '  . ($orderlist->qnty * $product_data['total_product_price']);
				$html .= '</div>';

				$orderlist_ids_array[] = $orderlist_id;
				$this->CartModel->delete($orderlist->id);
			}
			$orderlist_ids = implode(',', $orderlist_ids_array);
			$dpot_id = $this->input->post('dpot_id');
			$total = $this->input->post('total');
			$html .= '<div>Order Total: ' . CURRENCY . ' ' . $total . '</div>';
			$user_id = logged_in_user_row()->id;
			$status = 0;
			$created_at = date('Y-m-d H:i:s');
			$order_data = [
				'user_id' => $user_id,
				'dpot_id' => $dpot_id,
				'orderlist_ids' => $orderlist_ids,
				'total' => $total,
				'status' => $status,
				'created_at' => $created_at,
			];
			$order_data_id = $this->OrderModel->add($order_data);
			$order_id = 'OR' . str_pad($order_data_id, 6, '0', STR_PAD_LEFT);
			$order_id_data = [
				'order_no' => $order_id
			];
			$this->OrderModel->update($order_id_data, $order_data_id);
			if ($order_data_id !== false) {
				//invoice mail
				if ($_SERVER['SERVER_NAME'] == 'localhost' || $_SERVER['HTTP_HOST'] == 'localhost') {
					// code to run if server is localhost
				} else {
					$to_mail = logged_in_user_row()->email;
					$subject = 'AWPL Order Invoice';
					$this->multipleNeedsModel->mail($to_mail, $subject, $html);
				}
				//mail end
				redirect('thank-you');
			}
		} else {
			redirect($_SERVER['HTTP_REFERER']);
		}
	}
	public function about()
	{
		$data['folder'] = 'frontend';
		$data['template'] = 'about';
		$data['title'] = 'AWPL About';
		$this->load->view('layout', $data);
	}
	public function faq()
	{
		$data['folder'] = 'frontend';
		$data['template'] = 'faq';
		$data['title'] = 'AWPL FAQ';
		$this->load->view('layout', $data);
	}
	public function contact()
	{
		$data['folder'] = 'frontend';
		$data['template'] = 'contact';
		$data['title'] = 'AWPL Contact';
		$this->load->view('layout', $data);
	}
	public function thankyou()
	{
		$data['folder'] = 'frontend';
		$data['template'] = 'thankyou';
		$data['title'] = 'AWPL Thank You';
		$this->load->view('layout', $data);
	}
	public function myaccount($type = 0)
	{
		$data['orders'] = $this->OrderModel->getorderbyuser(logged_in_user_row()->id, $type);
		$data['type'] = $type;
		$data['folder'] = 'frontend';
		$data['template'] = 'my_account';
		$data['title'] = 'AWPL Account';
		$this->load->view('layout', $data);
	}
	public function show_order_detail($id)
	{
		$order_row = $this->OrderModel->getorderbyid($id);
		$order_no = $order_row->order_no;
		$depot_name = $order_row->depot_name;
		$total = $order_row->total;
		$orderlist_ids = $order_row->orderlist_ids;
		$ids_array = explode(',', $orderlist_ids);
?>
		<div class="modal-header">
			<h2 class="modal-title" id="exampleModalLabel">Order Number <span><?= $order_no ?></span></h2>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<i class="fa-solid fa-xmark"></i>
			</button>
		</div>
		<div class="modal-body">
			<div class="row">
				<div class="col-md-12">
					<div class="responsive-table-all cart-table">
						<table>
							<thead>
								<tr>
									<th scope="col">Product</th>
									<th scope="col">Price</th>
									<th scope="col">Qty.</th>
									<th class="with-unset" scope="col">Total</th>
								</tr>
							</thead>
							<tbody>
								<?php
								foreach ($ids_array as $item) {
									$item_row = $this->OrderModel->getorderlistbyid($item);
									$img_src = GET_UPLOADS . 'products/' . $item_row->product_img;
									$product_name = $item_row->product_name;
									$product_size = $item_row->product_size;
									$price = $item_row->price;
									$qnty = $item_row->qnty;
									$total_p = $price * $qnty;
								?>
									<tr>
										<td data-label="Product">
											<div class="prodct-wth-img justify-unset">
												<div class="prdct-main-img">
													<img width="50" src="<?= $img_src ?>" alt="image">
												</div>
												<div class="prdct-nm-here">
													<p><?= $product_name ?></p>
													<span><?= $product_size ?></span>
												</div>
											</div>
										</td>
										<td data-label="Price"><?= CURRENCY . ' ' . $price ?></td>
										<td class="qun-t-cls" data-label="Qty."><?= $qnty ?></td>
										<td data-label="Total"><?= CURRENCY . ' ' . $total_p ?></td>
									</tr>
								<?php
								}
								?>
							</tbody>
						</table>
					</div>

					<div class="mobile-cart-product">
						<?php
						foreach ($ids_array as $item) {
							$item_row = $this->OrderModel->getorderlistbyid($item);
							$img_src = GET_UPLOADS . 'products/' . $item_row->product_img;
							$product_name = $item_row->product_name;
							$price = $item_row->price;
							$qnty = $item_row->qnty;
							$total_p = $price * $qnty;
						?>
							<div class="product-cntnt borer-btm-c">
								<div class="prduct-cntnt-img">
									<img width="50" src="<?= $img_src ?>" alt="image">
								</div>
								<div class="rspnv-prdct-dtls-mob w-90-cart">
									<div class="prdct-name-here">
										<p><?= $product_name ?><span class="ml-btl"><?= $product_size ?></span></p><span><?= $qnty ?></span> <span><?= CURRENCY . ' ' . $total_p ?></span>
									</div>
								</div>
							</div>
						<?php
						}
						?>
						<div class="price-qunty mob-sub-bg">
							<p class="price-txt">Sub Total</p>
							<p class="price-txt"><?= CURRENCY . ' ' . $total ?></p>
						</div>
						<div class="price-qunty mob-sub-bg">
							<p class="price-txt">Depot No.</p>
							<p class="price-txt"><?= $depot_name ?></p>
						</div>
						<div class="price-qunty total-pay">
							<p class="price-txt">Total</p>
							<p class="price-txt fnt-bold"><?= CURRENCY . ' ' . $total ?></p>
						</div>
					</div>
				</div>
				<div class="col-md-7"></div>
				<div class="col-md-5">
					<div class="sub-total-new">
						<div class="total-nmbr mb-3">
							<p>Sub Total</p>
							<p><?= CURRENCY . ' ' . $total ?></p>
						</div>
						<div class="total-nmbr mb-3">
							<p>Depot No</p>
							<p><?= $depot_name ?></p>
						</div>
						<div class="total-nmbr">
							<p>Total</p>
							<p style="font-size: 20px;"><?= CURRENCY . ' ' . $total ?></p>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="modal-footer">
			<div class="close-btn-btm">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			</div>
		</div>
<?php
	}
}
?>