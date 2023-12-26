@if(session('pesan'))
    <div role="alert" class="absolute right-0 z-50 transform -translate-x-1/2 -translate-y-1/2 top-8 left-1/2 w-fit alert alert-success alert-fade-out">
        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 stroke-current shrink-0" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
        <span>{{session('pesan')}}</span>
    </div>
@endif

<x-app-layout>
    <x-slot name="header">
            {{ __('Pelanggan') }}
    </x-slot>

    <a href="/pelanggan/create">
    <button class='float-right px-4 py-2 -mt-12 font-bold text-white bg-green-500 rounded-md hover:bg-green-600'>Tambah Pelanggan</button>
    </a>

    <div class="">
        @include('components/data-table')
        <body class="leading-normal tracking-wider text-gray-900 bg-gray-100">
            <!-- Container -->
            <div class="container w-full mx-auto md:w-4/5 lg:w-full">
    
                <!-- Card -->
                <div id='recipients' class="p-8 mt-6 bg-white rounded shadow lg:mt-0">
                    <table id="example" class="w-full stripe hover">
                        <thead>
                            <tr>
                                <th data-priority="1">No</th>
                                <th data-priority="2">Aksi</th>
                                <th data-priority="3">Nama</th>
                                <th data-priority="4">Alamat</th>
                                <th data-priority="5">No Telp</th>
                                <th data-priority="6">Created_at</th>
                                <th data-priority="7">Updated_at</th>
                            </tr>
                        </thead>
                        <tbody class="">
                            <?php
                            $num = 1;
                            foreach($dataAll as $datax){
                                echo "<tr>
                                <td>$num</td>
                                <td class='flex justify-center gap-0'>
                                    <a href=/pelanggan/update/".$datax->id_pelanggan.">
                                        <span class='p-2 text-gray-200 scale-75 bg-orange-400 rounded-sm cursor-pointer material-symbols-outlined hover:bg-orange-500'>edit</span>
                                    </a>
                                    <a href=/pelanggan/delete/".$datax->id_pelanggan.">
                                        <span class='p-2 text-gray-100 scale-75 bg-red-500 rounded-sm cursor-pointer material-symbols-outlined hover:bg-red-600'>delete</span>
                                    </a>
                                </td>
                                <td>$datax->nama_pelanggan</td>
                                <td>$datax->alamat</td>
                                <td>$datax->nomor_telepon</td>
                                <td>$datax->created_at</td>
                                <td>$datax->updated_at</td>
                            </tr>"
                            ;
                            $num++;
                            }
                            ?>
                            
                        </tbody>
                    </table>
                </div>
                <!--/Card-->
            </div>
            <!--/container-->
    
            <!-- jQuery -->
            <script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    
            <!-- Datatables -->
            <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
            <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
            <script>
                $(document).ready(function() {
                    var table = $('#example').DataTable({
                        responsive: true
                    }).columns.adjust().responsive.recalc();
                });
            </script>
        </body>
    
        </html>
    </div>


</x-app-layout>
