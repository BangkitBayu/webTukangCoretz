<table {{ $attributes->merge(['class' => 'table-auto w-full']) }}>
    @isset($tableHead)
        {{ $tableHead }}
    @endisset
    @isset($tableBody)
        {{ $tableBody }}
    @endisset
</table>
