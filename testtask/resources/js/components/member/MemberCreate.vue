<template>
    <div>
        <form novalidate class="md-layout" @submit.prevent="validateMember">
            <md-card class="md-layout-item md-size-50 md-small-size-100">
                <md-card-header>
                    <div class="md-title">Sign Up</div>
                </md-card-header>

                <md-card-content>
                    <div class="md-layout md-gutter">
                        <div class="md-layout-item md-small-size-100">
                            <md-field :class="getValidationClass('firstName')">
                                <label for="first-name">First Name</label>
                                <md-input name="first-name" id="first-name" autocomplete="given-name"
                                          v-model="form.firstName" :disabled="sending" required/>
                                <span class="md-error"
                                      v-if="!$v.form.firstName.required">The first name is required
                                </span>
                                <span class="md-error"
                                      v-else-if="!$v.form.firstName.minlength">First name must be more than 2 characters
                                </span>
                                <span class="md-error"
                                      v-else-if="!$v.form.firstName.maxlength">First name must be less than 12 characters
                                </span>
                                <div v-if="isError('firstName', 'required')">
                                    test
                                </div>
                            </md-field>
                        </div>

                        <div class="md-layout-item md-small-size-100">
                            <md-field :class="getValidationClass('lastName')">
                                <label for="last-name">Last Name</label>
                                <md-input name="last-name" id="last-name" autocomplete="family-name"
                                          v-model="form.lastName" :disabled="sending" required/>
                                <span class="md-error"
                                      v-if="!$v.form.lastName.required">The last name is required
                                </span>
                                <span class="md-error"
                                      v-else-if="!$v.form.lastName.minlength">Last name must be more than 2 characters
                                </span>
                                <span class="md-error"
                                      v-else-if="!$v.form.lastName.maxlength">Last name must be less than 12 characters
                                </span>
                            </md-field>
                        </div>
                    </div>

                    <div class="md-layout md-gutter">
                        <div class="md-layout-item md-small-size-100">
                            <md-field :class="getValidationClass('phone')">
                                <label for="phone">Phone Number</label>
                                <md-input name="phone" id="phone"
                                          v-model="form.phone" :disabled="sending" required/>
                                <span class="md-error"
                                      v-if="!$v.form.lastName.required">The phone number is required
                                </span>
                                <span class="md-error"
                                      v-else-if="!$v.form.phone.minlength">Phone Number must be more than 2 characters
                                </span>
                                <span class="md-error"
                                      v-else-if="!$v.form.phone.maxlength">Phone Number must be less than 12 characters
                                </span>
                            </md-field>
                        </div>

                        <div class="md-layout-item md-small-size-100">
                            <md-field :class="getValidationClass('amountInvest')">
                                <label for="amountInvest">Amount of invest</label>
                                <md-select name="amountInvest" id="amountInvest"
                                           v-model="form.amountInvest" :disabled="sending" required>
                                    <md-option value="100">100$</md-option>
                                    <md-option value="1000">1000$</md-option>
                                    <md-option value="10000">10000$</md-option>
                                    <md-option value="100000">100000$</md-option>
                                    <md-option value="1000000">1000000$</md-option>
                                </md-select>
                                <span class="md-error"
                                      v-if="!$v.form.amountInvest.required">The amount of invest is required
                                </span>
                            </md-field>
                        </div>
                    </div>

                    <md-field :class="getValidationClass('email')">
                        <label for="email">Email Address</label>
                        <md-input type="email" name="email" id="email" autocomplete="email" v-model="form.email"
                                  :disabled="sending" required/>
                        <span class="md-error" v-if="!$v.form.email.required">The email is required</span>
                        <span class="md-error" v-else-if="!$v.form.email.email">Invalid email</span>
                    </md-field>
                    <md-field :class="getValidationClass('confirmEmail')">
                        <label for="confirmEmail">Confirm Email Address</label>
                        <md-input type="email" name="email" id="confirmEmail" v-model="form.email"
                                  :disabled="sending"/>
                        <span class="md-error" v-if="!$v.form.email.required">The email is required</span>
                        <span class="md-error" v-else-if="!$v.form.email.email">Invalid email</span>
                    </md-field>

                    <md-field :class="getValidationClass('password')">
                        <label for="password">Password</label>
                        <md-input type="password" name="email" id="password" v-model="form.email"
                                  :disabled="sending" required/>
                        <span class="md-error" v-if="!$v.form.email.required">The email is required</span>
                        <span class="md-error" v-else-if="!$v.form.email.email">Invalid email</span>
                    </md-field>

                    <md-field :class="getValidationClass('confirmPassword')">
                        <label for="confirmPassword">Confirm Password</label>
                        <md-input type="password" name="email" id="confirmPassword" v-model="form.email"
                                  :disabled="sending"/>
                        <span class="md-error" v-if="!$v.form.email.required">The email is required</span>
                        <span class="md-error" v-else-if="!$v.form.email.email">Invalid email</span>
                    </md-field>

                    <div class="md-layout-item md-small-size-100">
                        <md-field :class="getValidationClass('agree')">
                            <md-checkbox v-model="form.agree" required>
                                I certify that I am 18 years of age or older, and I agree to the Terms of Service and
                                Privacy Policy.
                            </md-checkbox>
                            <span class="md-error" v-if="!$v.form.agree.accepted">This field is required</span>
                        </md-field>
                    </div>

                    <div class="md-layout-item md-small-size-100">
                        <md-field :class="getValidationClass('subscribe')">
                            <md-checkbox v-model="form.subscribe" required :class="getValidationClass('subscribe')">
                                I would like to receive important information and periodic news updates.
                            </md-checkbox>
                            <span class="md-error" v-if="!$v.form.subscribe.accepted">This field is required</span>
                        </md-field>
                    </div>
                </md-card-content>

                <md-progress-bar md-mode="indeterminate" v-if="sending"/>

                <md-card-actions>
                    <md-button type="submit" class="md-primary" :disabled="sending">Create Account</md-button>
                </md-card-actions>
            </md-card>
        </form>
    </div>
</template>

<script>
import {validationMixin} from 'vuelidate'
import {
    required,
    email,
    minLength,
    maxLength,
    sameAs
} from 'vuelidate/lib/validators';

export default {
    name: "member-create",
    mixins: [validationMixin],
    computed: {
        formFilled() {
            const values = _.values(this.form);
            return values.filter(el => !!el).length;
        }

    },
    data() {
        return {
            form: {
                firstName: '',
                lastName: '',
                phone: '',
                amountInvest: '',
                email: '',
                confirmEmail: '',
                password: '',
                confirmPassword: '',
                agree: false,
                subscribe: false,
            },
            sending: false,
            errors: {},
        }
    },
    validations: {
        form: {
            firstName: {
                required,
                minLength: minLength(2),
                maxLength: maxLength(12)
            },
            lastName: {
                required,
                minLength: minLength(2),
                maxLength: maxLength(12)
            },
            phone: {
                required,
                minLength: minLength(2),
                maxLength: maxLength(12)
            },
            amountInvest: {
                required
            },
            email: {
                required,
                email
            },
            confirmEmail: {
                sameAsEmail: sameAs('email')
            },
            password: {
                required,
                minLength: minLength(8),
            },
            confirmPassword: {
                sameAsPassword: sameAs('password')
            },
            agree: {
                accepted: sameAs(() => true)
            },
            subscribe: {
                accepted: sameAs(() => true)
            }
        }
    },
    methods: {
        getValidationClass(fieldName) {
            const field = this.$v.form[fieldName]

            if (field) {
                return {
                    'md-invalid': field.$invalid && field.$dirty
                }
            }
        },
        clearForm() {
            this.$v.$reset()
            const formKeys = _.keys(this.form);
            formKeys.forEach((key) => {
                if (key === 'agree' || key === 'subscribe') {
                    this.form[key] = false;
                } else {
                    this.form[key] = '';
                }
            });
        },
        saveMember() {
            const t = this;
            t.sending = true

            // Instead of this timeout, here you can call your API
            window.setTimeout(() => {
                this.lastUser = `${t.form.firstName} ${t.form.lastName}`
                this.userSaved = true
                this.sending = false
                this.clearForm()
            }, 1500)

            const formData = new FormData();
            const formKeys = _.keys(t.form);
            formKeys.forEach((key) => {
                formData.append(key, t.form[key]);
            });

            axios.post('/api/v1/member', formData, {
                headers: {
                    'Content-Type': 'multipart/form-data'
                }
            })
                .then((response) => {
                    console.log(response);
                    const parsedResponse = JSON.parse(response.data);
                    console.log(parsedResponse);
                    debugger;

                })
                .catch((error) => {
                    console.log(error.response);
                    if (error.response.data.errors) {
                        t.errors = _.cloneDeep(error.response.data.errors);
                    }
                    debugger;
                });

            console.log('created')
        },
        validateMember() {
            // this.$v.$touch()

            // if (!this.$v.$invalid) {
            this.saveMember()
            // }
        },
        isError(field, rule) {

            if (this.errors && this.errors[field]) {
                const finded = this.errors[field].filter(ruleBack => {
                    debugger;
                    return ruleBack[rule];
                });
                debugger;
                return finded.length;
            }

            return false;
        }
    }
}
</script>

<style scoped>

</style>
