<template>
        <div class="card" style="width: 18rem;">
            <img class="card-img-top" src="https://via.placeholder.com/500" alt="Card image cap" />
            <div class="card-body">
                <router-link :to="{ name:'bookable' , params:{id} }">
                    <h5 class="card-title">{{ title }}</h5>
                </router-link>
                    <p class="card-text">{{ description }}</p>
            </div>
        </div>
</template>

<script>
export default {
    props: {
        title: String,
        description: String,
        id: Number
    }
};
</script>
