
<script>
    import BootstrapTable from 'bootstrap-table/dist/bootstrap-table-vue.min.js'
    export default {
        props: ['models'],
        components: {
            'bootstrap-table': BootstrapTable
        },
        data () {
            return {
                mySelections: [],
                myData: [],
                myOptions: {
                    search: true,
                    pagination: true,
                    paginationPreText: 'Previous',
                    paginationNextText: 'Next',
                    pageSize: 5,
                    pageList: [5, 10, 25, 50, 100, 200, "All"],
                    showColumns: true,
                    showPrint: true,
                    showExport: true,
                    exportDataType: "all",
                    filterControl: true,
                    toolbar: '#toolbar',
                    clickToSelect: true,
                    idField: 'id',
                    selectItemName: 'id',
                },
                myColumns: [
                    { field: 'id', title: 'ID', sortable: true },
                    { field: 'name', title: 'name', sortable: true, filterControl: 'input' },
                    { field: 'age', title: 'age', sortable: true, filterControl: 'input' },
                    { field: 'phone_number', title: 'phone_number', sortable: true, filterControl: 'select'},
                    { field: 'city', title: 'city', sortable: true, filterControl: 'input'},
                    { field: 'mail', title: 'mail', sortable: true, filterControl: 'select'},
                ]
            }
        },
        created () {
            this.myData = JSON.parse(this.models)
        },
        methods: {
        }
    }
</script>
