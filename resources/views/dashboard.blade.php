<x-app-layout>
    <x-slot name="header">
            {{ __('Pendapatan') }}
    </x-slot>

    <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
        <div class="p-6 border-b border-gray-200">
            <section>
                <div class="overflow-x-auto">
                <table class="table">
                    <!-- head -->
                    <thead>
                    <tr>
                        <th></th>
                        <th>Nama</th>
                        <th>Omset</th>
                        <th>Profit</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <!-- row 1 -->
                    <tr>
                        <th>1</th>
                        <td>Cy Ganderton</td>
                        <td>Quality Control Specialist</td>
                        <td>Blue</td>
                        <td class="flex gap-2">
                            <span class="cursor-pointer material-symbols-outlined hover:text-gray-500 ">edit</span>
                            <span class="cursor-pointer material-symbols-outlined hover:text-gray-500 ">delete</span>
                        </td>
                    </tr>
                    <!-- row 2 -->
                    <tr class="hover">
                        <th>2</th>
                        <td>Hart Hagerty</td>
                        <td>Desktop Support Technician</td>
                        <td>Purple</td>
                        <td>Purple</td>
                    </tr>
                    <!-- row 3 -->
                    <tr>
                        <th>3</th>
                        <td>Brice Swyre</td>
                        <td>Tax Accountant</td>
                        <td>Red</td>
                    </tr>
                    </tbody>
                </table>
                </div>
            </section>
        </div>
    </div>
</x-app-layout>
