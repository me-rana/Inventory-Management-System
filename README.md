<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<h3> Simplified Custom Inventory Management System (IMS) </h3>
 
<h4>Front Views</h4>
<li>Home Page</li>
<li>Search Product</li>
<li>Contact Submit</li>
<li>Single Product Page</li>
<br>
<p> <h4>Functionality </h4><br>
<li>Authentication</li>
<li>Validation</li>
<li>Add New Product</li>
<li>Update New Product</li>
<li>Store Data</li>
<li>Delete Data</li>
[If You are authenticated in that case you can do above operations] <br>
<strong> -->Delete or Update Image previous image will be removed. </strong>
<br>
Backend View--> Create a Account and You can delete or modify data. <br>
<br>
Demo Website  :  <a href="https://sample3.ranasvc.com"> <strong> https://sample3.ranasvc.com </strong> </a> <br>
Demo Username :  <strong> admin@test.me </strong> <br>
Demo Password :  <strong> adminx4312 </strong>
<br>
<br>
    //Contact Validate 
    <br>
    $request->validate( <br>
                [<br>
                    'name'  =>  'required', <br>
                    'email' => 'required|email',<br>
                    'subject' => 'required',<br>
                    'message' => 'required'<br>
                ]);<br>
                //Product Validate<br>
     $req->validate(<br>
            [<br>
                'name'  =>  'required',<br>
                'quantity' => 'required|integer',<br>
                'price' => 'required|integer',<br>
            ]);<br>
<br><br>
 <strong>Any authenticate user can delete or modify any data due to I build it a simple CRUD Operation.</strong> <br><br>
Live Preview of the website <a href="https://sample3.ranasvc.com">Visit Now! SCIMS</a> <br>

<img src="screenshots/screenshot_x1.png" width="400px">
<img src="screenshots/screenshot_x2.png" width="400px">
<img src="screenshots/screenshot_x3.png" width="400px">
<img src="screenshots/screenshot_x4.png" width="400px">

<br>
Thanks,<br>
Rana Bepari<br>
<a href="https://ranasvc.com">Official Website</a> <br> You can see some of my update project to visit my website
 </p>