@extends('layouts.layout')

@section('content')
    <div class="page-header clearfix">
        <h2 class="pull-left">Invoices</h2>
        <a href="/invoices/new" class="btn btn-success pull-right">
            Generate Invoices</a>
    </div>

    <table class="table table-striped clearfix">
        <thead>
        <tr>
            <th>#</th>
            <th>Order Number</th>
            <th>Invoice Date</th>
            <th>Customer</th>
            <th>Description</th>
            <th class="text-right">Total</th>
        </tr>
        </thead>
        <?php foreach ($invoices as $invoice): ?>
        <tr>
            <td>
                <a href="/invoices/view/{{{ $invoice->getId() }}}">
                    {{{ $invoice->getId() }}}</a>
            </td>
            <td>{{{ $invoice->getOrder()->getOrderNumber() }}}</td>
            <td>
                {{{ $invoice->getInvoiceDate()->format('m/d/Y') }}}
            </td>
            <td>
                <a href="/customers/edit/{{{ $invoice->getOrder()->getCustomer()->getId() }}}">
                    {{{ $invoice->getOrder()->getCustomer()->getName() }}}</a>
            </td>
            <td>{{{ $invoice->getOrder()->getDescription() }}}</td>
            <td class="text-right">
                $ {{{ number_format($invoice->getTotal(), 2) }}}
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
@stop