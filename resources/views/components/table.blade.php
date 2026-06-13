<table {{ $attributes->merge(['class' => 'table table-auto w-full']) }} style="scrollbar-width:thin;">
    <thead class=" border-b border-t border-white/10">
        {{ $tableHead }}
    </thead>
    <tbody>
        {{ $tableBody }}
    </tbody>
</table>
