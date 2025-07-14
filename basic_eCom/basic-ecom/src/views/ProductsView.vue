<template>
    <div class="products mx-4">
        <br>
        <h2 class="mb-4">Our Products</h2>
        <div class="product-cards row g-4">
            <div class="col-md-4" v-for="item in items" :key="item.item_id">
                <div class="card h-100 shadow-sm">
                    <div class="p-4">
                        <img :src="item.item_url" :alt="item.item_name" class="card-img-top">
                    </div>
                    <h5 class="mt-4">{{ item.item_name }}</h5>
                    <p>{{ item.item_description }}</p>
                    <div class="row my-3">
                        <div class="price col"><p>R{{ item.item_price }}</p></div>
                        <div class="col"><button class="btn btn-danger" @click="addToCart(item.item_id)">Add To Cart</button></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
 
<script>
    export default {
        name: "Products",
        data() {
            return {
                items: [],
                user: null
            };
        },
        mounted() {
            fetch("/data.json")
                .then(res => res.json())
                .then(data => {
                    this.items = data.items;
                })
                .catch(error => {
                    console.error("Error loading data.json:", error);
                });
            
            // loggin-in user
            const userData = localStorage.getItem("user");
            if (userData) {
                this.user = JSON.parse(userData);
            } else {
                alert ("You must be logged in to add to cart");
                this.$router.push("/login");
            }
        },
        methods: {
            addToCart(item_id) {
                if (!this.user) {
                    alert("Please log in first");
                    return;
                }

                fetch("/php-backend/add_to_cart.php", {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json"
                    },
                    body: JSON.stringify({
                        item_id: item_id,
                        user_id: this.user.user_id
                    })
                })
                    .then(res => res.json())
                    .then(res => {
                        alert(res.message || "Added to cart!");
                    })
                    .catch(error => {
                        console.error("Error adding to cart: ", error);
                    });
            }
        }
    };
</script>

<style scoped>
    h2 {
        font-size: 50px;
        color: rgb(223, 0, 45);
    }
    .card-img-top {
        object-fit: cover;
        height: 300px;
    }
    .price {
        font-size: 20px;
    }
    .card {
        background-color:rgb(25, 24, 24);
        color: white;
    }
    .card:hover {
        box-shadow: 0 4px 20px rgba(223, 0, 45, 0.6) !important;
    }
</style>