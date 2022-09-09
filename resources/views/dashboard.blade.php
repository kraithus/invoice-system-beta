<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                @if(session()->has('message'))
                <div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
                                {{ session()->get('message') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                @endif
                <div class="p-6 bg-white border-b border-gray-200">
                    You're logged in!
                </div>
                <div class="p-6 bg-white border-b border-gray-200">
                    <a href="customer/create">Add Customer</a>
                </div>
                <div class="p-6 bg-white border-b border-gray-200">
                    <a href="job/create">New Job</a>
                </div>
                <div class="p-6 bg-white border-b border-gray-200">
                    <a href="quotation">Quotations</a>
                </div>
                <div class="p-6 bg-white border-b border-gray-200">
                    <a href="test-datatables">Quotations Test</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
