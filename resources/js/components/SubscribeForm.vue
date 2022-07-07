<template>
    <form v-on:submit.prevent="submitSubscribeForm">
        <div class="row ">
            <div class="col-md-6">
                <div class="">
                    <label class="form-label" for="email">Email</label>
                    <input type="email" class="form-control" id="email" name="email" v-model="form.email" placeholder="Your email">
                </div>
            </div>
            <div class="col-md-6">
                <div class="">
                    <label class="form-label" for="target_price">Target price</label>
                    <input type="text" class="form-control" id="target_price" name="target_price" v-model="form.target_price" value="20.0000">
                </div>
            </div>
        </div>
        <div class="mt-6 mb-2">
            <button type="submit" class="btn btn-primary w-full">Subscribe</button>
        </div>
        <div v-if="error_message" class="alert alert-danger">{{ error_message }}</div>
        <div v-if="success_message" class="alert alert-success">{{ success_message }}</div>
    </form>
</template>

<script>


export default {
    name: 'SubscribeForm',
    data() {
        return {
            form: {
                email: '',
                target_price: '20.000',
            },
            error_message: false,
            success_message: false,
        }
    },
    methods: {
        submitSubscribeForm() {
            this.error_message = false;
            this.success_message = false;
            axios.post('/subscribe', this.form)
                .then((res) => {
                    this.error_message = false;
                    this.success_message = res.data.message;
                })
                .catch((error) => {
                    let error_message = error.response.data.message ?? 'Something happened';
                    this.error_message = error_message;
                    this.success_message = false;
                });
        }
    }
}
</script>
