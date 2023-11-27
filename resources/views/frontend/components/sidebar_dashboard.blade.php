<img src="{{ !empty($user->avatar) ? url('upload/user_images/' . $user->avatar) : url('upload/no_images.jpg') }}"
    class="card-img-top center" style="margin: 0 0 15px 30px; border-radius: 50%" height="100px" width="100px">

<ul class="list-group list-group-flush">
    <a href="/" class="btn btn-primary btn-sm btn-block">Home</a>
    <a href="/user/profile" class="btn btn-primary btn-sm btn-block">Update Profile</a>
    <a href="/user/change-password" class="btn btn-primary btn-sm btn-block">Change Password</a>
    <a href="/user/order" class="btn btn-primary btn-sm btn-block">Orders</a>
    <a href="/log-out" class="btn btn-danger btn-sm btn-block">Logout</a>
</ul>
