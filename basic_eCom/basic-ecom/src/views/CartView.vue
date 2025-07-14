<template>
  <div class="container mt-5">
    <h2 class="mb-4">Your Cart</h2>

    <div v-if="cartItems.length === 0">
      <p>Your cart is empty.</p>
    </div>

    <div v-else class="cart-items">
      <div class="card mb-3 p-3" v-for="item in cartItems" :key="item.item_id">
        <div class="row align-items-center">
          <div class="col-md-3">
            <img :src="item.item_url" :alt="item.item_name" class="img-fluid rounded" />
          </div>
          <div class="col-md-6">
            <h5>{{ item.item_name }}</h5>
            <p>{{ item.item_description }}</p>
            <p>Price: R{{ item.item_price }}</p>
            <p>Quantity: {{ item.quantity }}</p>
            <p>Subtotal: R{{ item.item_price * item.quantity }}</p>
          </div>
          <div class="col-md-3 text-end">
            <button class="btn btn-danger" @click="removeFromCart(item.item_id)">
              Remove
            </button>
          </div>
        </div>
      </div>

      <div class="text-end mt-4">
        <h4>Total: R{{ total }}</h4>
        <button class="btn btn-secondary me-2" @click="clearCart">Clear Cart</button>
        <button class="btn btn-success" @click="checkout">Proceed to Checkout</button>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "CartView",
  data() {
    return {
      user: null,
      cartItems: []
    };
  },
  computed: {
    total() {
      return this.cartItems.reduce(
        (sum, item) => sum + item.item_price * item.quantity,
        0
      );
    }
  },
  mounted() {
    const userData = localStorage.getItem("user");
    if (!userData) {
      alert("You must be logged in to view your cart");
      this.$router.push("/login");
      return;
    }

    this.user = JSON.parse(userData);
    const storedCart = JSON.parse(localStorage.getItem("cart"));
    this.cartItems = storedCart || [];
  },
  methods: {
    removeFromCart(item_id) {
      this.cartItems = this.cartItems.filter(item => item.item_id !== item_id);
      localStorage.setItem("cart", JSON.stringify(this.cartItems));
      alert("Item removed");
    },
    clearCart() {
      this.cartItems = [];
      localStorage.removeItem("cart");
    },
    checkout() {
      alert("Order placed! Thank you for your purchase.");
      this.clearCart();
      this.$router.push("/");
    }
  }
};
</script>

<style scoped>
h2 {
  font-size: 40px;
  color: rgb(223, 0, 45);
}
.card {
  background-color: #1a1a1a;
  color: white;
}
.img-fluid {
  max-height: 150px;
  object-fit: cover;
}
</style>
