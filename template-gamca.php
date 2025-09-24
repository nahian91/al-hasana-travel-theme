<?php
/*
Template Name: Gamca
*/

get_header();
?>

        <!-- breadcrumb-wrappe-Section Start -->
        <section class="breadcrumb-wrapper fix bg-cover" style="background-image: url(<?php echo get_template_directory_uri();?>/assets/img/breadcrumb/breadcrumb.jpg);">
            <div class="container">
                <div class="row">
                    <div class="page-heading">
                        <h2><?php the_title();?></h2>
                        <ul class="breadcrumb-list">
                            <li>
                                <a href="<?php echo site_url();?>">Home</a>
                            </li>
                            <li><i class="fa-regular fa-chevrons-right"></i></li>
                            <li><?php the_title();?></li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>

        <section class="tour-section section-padding fix">
    <div class="container custom-container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <div class="comment-form-wrap gtamca-form">
    <form action="#" method="POST">
        <div class="row">
            <div class="col-md-4">
                <div class="form-clt">
                    <span>Full Name</span>
                    <input type="text" name="tour_phone" placeholder="Full Name">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-clt">
                    <span>Date of Birth </span>
                    <input type="text" name="tour_phone" placeholder="Date of Birth ">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-clt">
                    <span>Gender</span>
                    <select name="tour_destination" class="nice-select w-100">
                        <option value="">Select</option>
                        <option value="">Male</option>
                        <option value="">Female</option>                        
                    </select>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-clt">
                    <span>Marital Status</span>
                    <select name="tour_destination" class="nice-select w-100">
                        <option value="">Select</option>
                        <option value="">Single</option>
                        <option value="">Married</option>                        
                    </select>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-clt">
                    <span>Visa Type </span>
                    <select name="tour_destination" class="nice-select w-100">
                        <option value="">Select</option>
                        <option value="">Work Visa</option>
                        <option value="">Family Visa</option>                        
                    </select>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-clt">
                    <span>Position applied for </span>
                    <select name="tour_destination" class="nice-select w-100">
  <option value="" selected="">---------</option>
  <option value="19">Carpenter</option>

  <option value="20">Cashier</option>

  <option value="21">Electrician</option>

  <option value="22">Engineer</option>

  <option value="23">General Secretory</option>

  <option value="24">Health &amp; Medicine &amp; Nursing</option>

  <option value="18">Banking &amp; Finance</option><option value="25">Heavy Driver</option>

  <option value="26">IT &amp; Internet Engineer</option>

  <option value="27">Leisure &amp; Tourism</option>

  <option value="28">Light Driver</option>

  <option value="29">Mason</option>

  <option value="30">President</option>

  <option value="31">Labour</option>

  <option value="32">Plumber</option>

  <option value="33">Doctor</option>

  <option value="34">Family</option>

  <option value="35">Steel Fixer</option>

  <option value="36">Aluminum Technician</option>

  <option value="37">Nurse</option>

  <option value="38">Male Nurse</option>

  <option value="39">Ward Boy</option>

  <option value="40">Shovel Operator</option>

  <option value="41">Dozer Operator</option>

  <option value="42">Car Mechanic</option>

  <option value="43">Petrol Mechanic</option>

  <option value="44">Diesel Mechanic</option>

  <option value="45">Student</option>

  <option value="46">Accountant</option>

  <option value="47">Lab Technician</option>

  <option value="48">Drafts man</option>

  <option value="49">Auto-Cad Operator</option>

  <option value="50">Painter</option>

  <option value="51">Tailor</option>

  <option value="52">Welder</option>

  <option value="53">X-ray Technician</option>

  <option value="54">Lecturer</option>

  <option value="55">A.C Technician</option>

  <option value="56">Business</option>

  <option value="57">Cleaner</option>

  <option value="58">Security Guard</option>

  <option value="59">House Maid</option>

  <option value="60">Manager</option>

  <option value="61">Hospital Cleaning</option>

  <option value="62">Mechanic</option>

  <option value="63">Computer Operator</option>

  <option value="64">House Driver</option>

  <option value="65">Driver</option>

  <option value="66">Cleaning Labour</option>

  <option value="67">Building Electrician</option>

  <option value="68">Salesman</option>

  <option value="69">Plastermason</option>

  <option value="70">Servant</option>

  <option value="71">Barber</option>

  <option value="72">Residence</option>

  <option value="73">Shepherds</option>

  <option value="74">Employment</option>

  <option value="75">Fuel Filler</option>

  <option value="76">Worker</option>

  <option value="77">House Boy</option>

  <option value="78">House Wife</option>

  <option value="79">RCC Fitter</option>

  <option value="80">Clerk</option>

  <option value="81">Microbiologist</option>

  <option value="82">Teacher</option>

  <option value="83">Helper</option>

  <option value="84">Hajj Duty</option>

  <option value="85">Shuttering</option>

  <option value="86">Supervisor</option>

  <option value="87">Medical Specialist</option>

  <option value="88">Office Secretary</option>

  <option value="89">Technician</option>

  <option value="90">Butcher</option>

  <option value="91">Arabic Food Cook</option>

  <option value="92">Agricultural Worker</option>

  <option value="93">Service</option>

  <option value="94">Studio CAD Designer</option>

  <option value="95">Financial Analyst</option>

  <option value="96">Cabin Appearance (AIR LINES)</option>

  <option value="97">Car Washer</option>

  <option value="98">Surveyor</option>

  <option value="99">Electrical Technician</option>

  <option value="100">Waiter</option>

  <option value="103">Nursing helper</option>

  <option value="104">Anesthesia technician</option>

  <option value="105">&lt;s&gt;Marvel</option>

  <option value="106">Marvel</option>

  <option value="107">Construction worker</option>

  <option value="108">Other</option>              
                    </select>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-clt">
                    <span>Phone</span>
                    <input type="text" name="tour_phone" placeholder="Phone">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-clt">
                    <span>Email</span>
                    <input type="text" name="tour_phone" placeholder="Email">
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-clt">
                    <button type="submit" class="theme-btn w-100">Submit Tour Request</button>
                </div>
            </div>
        </div>
    </form>
                                                </div>
            </div>
        </div>
    </div>
</section>

        <?php get_footer();?>