<template>
    <div>
        Rows are : {{ rows }}
        <div v-if="loading">Data is loading...</div>
        <div v-else>
            <div class="row mb-4" v-for="row in rows" :key="'row' + row">
                <div
                    class="col d-flex align-items-stretch"
                    v-for="(bookable, column) in bookablesInRow(row)"
                    :key="'row' + row + column"
                >
                    <bookable-list-item v-bind="bookable"></bookable-list-item>
                </div>
                <div
                    class="col"
                    v-for="item in placeholderInRow(row)"
                    :key="'placeholder' + item + row"
                ></div>
            </div>
        </div>
        <!-- <pagination
            :data="bookables"
            @pagination-change-page="getResults"
        ></pagination> -->
    </div>
</template>

<script>
import BookableListItem from "./BookableListItem";
export default {
    components: {
        BookableListItem
    },
    data() {
        return {
            bookables: null,
            loading: false,
            columns: 3
        };
    },
    computed: {
        rows() {
            return this.bookables === null
                ? 0
                : Math.ceil(this.bookables.length / this.columns);
        }
    },
    methods: {
        bookablesInRow(row) {
            return this.bookables.slice(
                (row - 1) * this.columns,
                row * this.columns
            );
        },
        placeholderInRow(row) {
            return this.columns - this.bookablesInRow(row).length;
        }
    },
    created() {
        this.loading = true;
        // this.getResults();
        axios.get("/api/bookables").then(response => {
            this.bookables = response.data.data;
            this.loading = false;
        });
    }
    // ,
    // methods:{
    //      getResults(page) {
    //             if (typeof page === 'undefined') {
    //                 page = 1;
    //             }
      
    //             axios.get('api/bookables?page=' + page)
    //                 .then(response => {
    //                     this.bookables = response.data.data;
    //                     this.loading = false;
    //                 })
    //         }
    // }
};
</script>
