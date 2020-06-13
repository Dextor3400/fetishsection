<x-user-master>
    @section('title', 'Contact')
    @section('content')
        <!-------------------------------------CONTACT FORM------------------------------------->

        <h1 class="display-4 text-center my-5">Contact Us</h1>
        <h3 class="h3 text-center my-4">DROP US A LINE:</h3>
        <form class="mb-5">
            <div class="form-row justify-content-center">
                <div class="col-10 col-md-8 col-lg-6">
                    <input type="text" class="form-control my-2 " placeholder="Name">
                    <input type="email" class="form-control my-2" placeholder="Email">
                    <input type="tel" class="form-control my-2" placeholder="Phone">
                    <textarea class="form-control my-2" placeholder="Type your message here..." rows="4"></textarea>
                    <div class="text-right">
                        <button type="submit" class="btn btn-primary px-5">Submit</button>
                    </div>
                </div>
            </div>
        </form>
    @endsection
</x-user-master>
