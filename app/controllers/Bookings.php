<?php
class Bookings extends Controller
{

    public function __construct()
    {
        $this->bookingModel = $this->model('Booking');
        $this->userModel = $this->model('User');
    }

    public function pickcategory()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $data = [
                'category' => trim($_POST['category'])
            ];
            if ($this->bookingModel->saveCategory($data)) {
                redirect('bookings/booksession');
            } else {
                die('something went wrong');
            }
        } else {
            $category = $this->bookingModel->getCategory();
            $data = [
                'categories' => $category
            ];

            $this->view('bookings/pickcategory', $data);
        }
    }

    public function booksession()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $id = $_SESSION['user_id'];
            $getBookingId = $this->bookingModel->getBookingId($id);

            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $data = [
                'id' => $getBookingId->id,
                'name' => trim($_POST['name']),
                'email' => trim($_POST['email']),
                'phone' => trim($_POST['phone']),
                'price' => str_replace(array('#', ',', '.00'), '', ($_POST['price'])),
                'date' => $_POST['date'],
                'name_err' => '',
                'email_err' => '',
                'phone_err' => '',
                'price_err' => '',
                'date_err'  => ''
            ];
            $dateExist = $this->bookingModel->dateExist($data['date']);

            if (empty($data['date'])) {
                $data['date_err'] = 'You did not select a date';
            }

            if (!($data['date']) == $dateExist) {
                if ($this->bookingModel->bookSession($data)) {
                    redirect('bookings/payment');
                } else {
                    die('something went wrong');
                }
            } else {
                flash2('error', 'Oops! seems Your date has been booked or date field was missing');
                redirect('bookings/booksession');
            }
        } else {
            $id = $_SESSION['user_id'];
            $userdetails = $this->userModel->getUserById($id);
            $getBookingId = $this->bookingModel->getBookingId($id);
            $getPrice = $this->bookingModel->getMatchingPrice($getBookingId->category);
            $data = [
                'id' => $getBookingId->id,
                'name' => $userdetails->name,
                'email' => $userdetails->email,
                'phone' => $userdetails->phone,
                'price' => $getPrice->price,
                'date' => '',
                'name_err' => '',
                'email_err' => '',
                'phone_err' => '',
                'price_err' => '',
                'date_err' => ''
            ];
            $this->view('bookings/booksession', $data);
        }
    }

    public function bookself()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $id = $_SESSION['user_id'];
            $getBookingId = $this->bookingModel->getBookingId($id);

            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $data = [
                'id' => $getBookingId->id,
                'name' => trim($_POST['name']),
                'email' => trim($_POST['email']),
                'phone' => trim($_POST['phone']),
                'price' => str_replace(array('#', ',', '.00'), '', ($_POST['price'])),
                'date' => $_POST['date'],
                'state' => trim($_POST['state']),
                'town' => trim($_POST['town']),
                'addr' => trim($_POST['addr']),
                'name_err' => '',
                'email_err' => '',
                'phone_err' => '',
                'price_err' => '',
                'date_err' => '',
                'state_err' => '',
                'town_err' => '',
                'addr_err' => ''
            ];
            if (empty($data['date'])) {
                $data['date_err'] = 'You did not select a date';
            }

            if (empty($data['state'])) {
                $data['state_err'] = 'Please type in current state';
            }
            if (empty($data['town'])) {
                $data['town_err'] = 'What is your current town';
            }
            if (empty($data['addr'])) {
                $data['addr_err'] = 'Address field is missing';
            }

            if (empty($data['date_err'])) {
                if ($this->bookingModel->bookSelf($data)) {
                    redirect('bookings/payment');
                } else {
                    die('something went wrong');
                }
            } else {
                $this->view('bookings/bookself', $data);
            }
        } else {
            $id = $_SESSION['user_id'];
            $userdetails = $this->userModel->getUserById($id);
            $getBookingId = $this->bookingModel->getBookingId($id);
            $getPrice = $this->bookingModel->getMatchingPrice($getBookingId->category);
            $data = [
                'id' => $getBookingId->id,
                'name' => $userdetails->name,
                'email' => $userdetails->email,
                'phone' => $userdetails->phone,
                'price' => $getPrice->price,
                'date' => '',
                'state' => '',
                'town' => '',
                'addr' => '',
                'name_err' => '',
                'email_err' => '',
                'phone_err' => '',
                'price_err' => '',
                'date_err' => '',
                'state_err' => '',
                'town_err' => '',
                'addr_err' => ''
            ];
            $this->view('bookings/bookself', $data);
        }
    }

    public function category()
    {
        $category = $this->bookingModel->getCategory();
        $data = [
            'categories' => $category
        ];
        $this->view('bookings/category', $data);
    }

    public function addCategory()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $data = [
                'category' => trim($_POST['category']),
                'price' => trim($_POST['price']),
                'description' => trim($_POST['description']),
                'category_err' => '',
                'price_err' => '',
                'description_err' => ''
            ];
            if (empty($data['price'])) {
                $data['price_err'] = 'Please enter price';
            }
            if (empty($data['category'])) {
                $data['category_err'] = 'What is the category';
            }
            if (empty($data['description'])) {
                $data['description_err'] = 'Please describe this category';
            }

            if (empty($data['price_err']) && empty($data['description_err']) && empty($data['category_err'])) {
                if ($this->bookingModel->category($data)) {
                    flash('success', 'You have created a category');
                    redirect('bookings/category');
                } else {
                    die('something went wrong');
                }
            } else {
                $this->view('bookings/addcategory', $data);
            }
        } else {
            $data = [
                'category' => '',
                'price' => '',
                'description' => '',
                'category_err' => '',
                'price_err' => '',
                'description_err' => ''
            ];
            $this->view('bookings/addcategory', $data);
        }
    }

    public function editcategory($id)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $data = [
                'id' => $id,
                'category' => trim($_POST['category']),
                'price' => trim($_POST['price']),
                'description' => trim($_POST['description']),
                'category_err' => '',
                'price_err' => '',
                'description_err' => ''
            ];
            if (empty($data['price'])) {
                $data['price_err'] = 'Please enter price';
            }
            if (empty($data['category'])) {
                $data['category_err'] = 'What is the category';
            }
            if (empty($data['description'])) {
                $data['description_err'] = 'Please describe this category';
            }

            if (empty($data['price_err']) && empty($data['description_err']) && empty($data['category_err'])) {
                if ($this->bookingModel->editCategory($data)) {
                    flash('success', 'make up category has been updated');
                    redirect('bookings/category');
                } else {
                    die('something went wrong');
                }
            } else {
                $this->view('bookings/editcategory', $data);
            }
        } else {
            $category = $this->bookingModel->getUserByCategory($id);
            $data = [
                'id' => $category->id,
                'category' => $category->category,
                'price' => $category->price,
                'description' => $category->description,
                'category_err' => '',
                'price_err' => '',
                'description_err' => ''
            ];
            $this->view('bookings/editcategory', $data);
        }
    }

    public function removeCategory($id)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = [
                'id' => $id
            ];
            if ($this->bookingModel->removeCategory($id)) {
                redirect('bookings/category');
            } else {
                die('something went wrong');
            }
        } else {
            redirect('bookings/category');
        }
    }

    public function payment()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id = $_SESSION['user_id'];
            $getBookingId = $this->bookingModel->getBookingId($id);
            $data = [
                'id' => $getBookingId->id,
                'status' => $_POST['status']
            ];
            if ($this->bookingModel->updatePay($data)) {
                redirect('bookings/mybookings/' . $id);
            } else {
                die('something might have gone wrong');
            }
        } else {
            $id = $_SESSION['user_id'];
            $getBookingId = $this->bookingModel->getBookingId($id);
            $data = [
                'id' => $getBookingId->id,
                'status' => ''
            ];
            $this->view('bookings/payment', $data);
        }
    }

    public function initialize()
    {
        $id = $_SESSION['user_id'];
        $getBookingId = $this->bookingModel->getBookingId($id);

        $curl = curl_init();
        $email = $getBookingId->email;
        $amount = $getBookingId->price;

        if ($getBookingId->date_status === "accepted") {
            $callback_url = URLROOT . '/bookings/callback';
            curl_setopt_array($curl, array(
                CURLOPT_URL => "https://api.paystack.co/transaction/initialize",
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_CUSTOMREQUEST => "POST",
                CURLOPT_POSTFIELDS => json_encode([
                    'amount' => $amount,
                    'email' => $email,
                    'callback_url' => $callback_url
                ]),

                CURLOPT_HTTPHEADER => [
                    "authorization: Bearer sk_test_4dee7019172d3ddf1e308b1f9551ff181f35ba5a", //replace this with your own test key
                    "content-type: application/json",
                    "cache-control: no-cache"
                ],
            ));

            $response = curl_exec($curl);
            $err = curl_error($curl);

            if ($err) {
                // there was an error contacting the Paystack API
                die('Curl returned error: ' . $err);
            }

            $tranx = json_decode($response, true);

            if (!$tranx['status']) {
                // there was an error from the API
                print_r('API returned error: ' . $tranx['message']);
            }

            // comment out this line if you want to redirect the user to the payment page
            //   print_r($tranx);
            // redirect to page so User can pay
            // uncomment this line to allow the user redirect to the payment page
            header('Location: ' . $tranx['data']['authorization_url']);
        } else {
            flash2('not_accepted', 'Please make sure your booked date has been accepted by '.SITENAME);
            redirect('bookings/mybookings/'.$_SESSION['user_id']);
        }
    }

    public function callback()
    {
        $curl = curl_init();
        $reference = isset($_GET['reference']) ? $_GET['reference'] : '';
        if (!$reference) {
            die('No reference supplied');
        }

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.paystack.co/transaction/verify/" . rawurlencode($reference),
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_HTTPHEADER => [
                "accept: application/json",
                "authorization: Bearer sk_test_4dee7019172d3ddf1e308b1f9551ff181f35ba5a",
                "cache-control: no-cache"
            ],
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        if ($err) {
            // there was an error contacting the Paystack API
            die('Curl returned error: ' . $err);
        }

        $tranx = json_decode($response);

        if (!$tranx->status) {
            // there was an error from the API
            die('API returned error: ' . $tranx->message);
        }

        if ('success' == $tranx->data->status) {
            flash('paystack_paid', 'Your payment has been successfully completed, Please notify us by clicking Paid');
            redirect('bookings/mybookings/' . $_SESSION['user_id']);
        }
    }

    public function mybookings($id)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = [
                'id' => $id,
                'status' => $_POST['status']
            ];

            if ($this->bookingModel->updatePay($data)) {
                flash('paid', 'You have notified the system that you have made a payment, wait for confirmation!');
                redirect('bookings/mybookings/' . $_SESSION['user_id']);
            } else {
                die('something might have gone wrong');
            }
        } else {
            $getMyBookings = $this->bookingModel->myBookings($id);
            $data = [
                'mybookings' => $getMyBookings,
                'id' => $id,
                'status' => ''
            ];
            $this->view('bookings/mybookings', $data);
        }
    }

    public function viewsingle($id)
    {
        $viewsingle = $this->bookingModel->viewSingle($id);
        $data = [
            'singleBooking' => $viewsingle
        ];
        $this->view('bookings/viewsingle', $data);
    }
}
