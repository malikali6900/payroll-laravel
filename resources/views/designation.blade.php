@extends('layouts.dashboard-layout')

@section('content')

   <!-- Page Wrapper -->
   <div id="wrapper">

    <!-- Sidebar -->

    @component('components.admin-dashboard')
    @endcomponent

    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">

            <!-- Topbar -->
            @component('components.top-bar')
            @endcomponent
            <!-- End of Topbar -->


                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1>User Data</h1>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Sr. No</th>
                                <th>Name</th>
                                <th>Designation</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $srNo = 1 @endphp
                            @foreach($userData as $data)
                                <tr>
                                    <td>{{ $srNo++ }}</td>
                                    <td class="user-id" style="display: none;">{{ $data->id }}</td>
                                    <td>
                                        @if($data->name !== null && $data->name !== '')
                                            {{ $data->name }}
                                        @else
                                            No Name entered
                                        @endif
                                    </td>
                                    <td>
                                        <input type="text" class="form-control" value="{{ $data->designation }}" placeholder="No Designation Entered" readonly>
                                    </td>
                                    <td>
                                        <button class="btn btn-primary edit-button">Edit</button>
                                        <button class="btn btn-success save-button" style="display: none;">Save</button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    
                    
                    <script>
                        const editButtons = document.querySelectorAll('.edit-button');
                        const saveButtons = document.querySelectorAll('.save-button');
                    
                        editButtons.forEach((editButton, index) => {
                            editButton.addEventListener('click', () => {
                                const row = editButton.closest('tr');
                                const userId = row.querySelector('.user-id').textContent;
                                const designationInput = row.querySelector('input');
                                const saveButton = saveButtons[index];
                    
                                if (editButton.textContent === 'Edit') {
                                    designationInput.readOnly = false;
                                    editButton.textContent = 'Cancel';
                                    saveButton.style.display = 'inline-block';
                                } else if (editButton.textContent === 'Cancel') {
                                    designationInput.readOnly = true;
                                    editButton.textContent = 'Edit';
                                    saveButton.style.display = 'none';
                                }
                            });
                        });
                    
                        saveButtons.forEach((saveButton, index) => {
    saveButton.addEventListener('click', () => {
        const row = saveButton.closest('tr');
        const userId = row.querySelector('.user-id').textContent;
        const designationInput = row.querySelector('input');
        const editButton = editButtons[index];

        const updatedDesignation = designationInput.value;

        // Send an AJAX request to update the designation
        axios.post(`/updateDesignation/${userId}`, { designation: updatedDesignation })
            .then((response) => {
                // Handle the response, e.g., display a success message
                console.log('Designation updated successfully');
            })
            .catch((error) => {
                // Handle errors, e.g., display an error message
                console.error('Error updating designation');
            });

        designationInput.readOnly = true;
        editButton.textContent = 'Edit';
        saveButton.style.display = 'none';
    });
});
                    </script>
                    
                    

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright © 2023 Giga Creatives Organization. All rights reserved.</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

@endsection