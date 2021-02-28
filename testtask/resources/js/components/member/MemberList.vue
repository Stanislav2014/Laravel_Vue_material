<template>
    <div>
        <md-card v-for="(item, index) in items" :key="index">
            <md-card-header>
                <md-card-header-text>
                    <div class="md-title">{{ item.first_name }}</div>
                    <div class="md-subhead">{{ item.last_name }}</div>
                </md-card-header-text>

                <md-card-media md-medium>
                    <img src="/img/avatar.png" alt="People">
                </md-card-media>
            </md-card-header>
            <md-card-content>
                <md-list>
                    <md-list-item>
                        <div class="s-container-flex--left">
                            <a :href="`mailto: ${item.email}`">
                                <span class="md-list-item-text">Sent Mail</span>
                            </a>
                            <md-icon>send</md-icon>
                        </div>
                    </md-list-item>
                </md-list>

            </md-card-content>

            <md-card-actions>
                <md-switch v-model="item.on_vacation" class="md-primary" @change="update(item.id, item.on_vacation)">On
                    vacation
                </md-switch>
            </md-card-actions>
        </md-card>
    </div>

</template>

<script>
export default {
    name: "member-list",
    data() {
        return {
            items: []
        }
    },
    async mounted() {
        await this.getList()
    },
    methods: {
        async getList() {
            axios.get('/api/v1/member').then(response => {
                this.items = response.data;
            }).catch(error => {
                console.log(error.response);
            });
        },
        async update(id, onVacation) {
            const data = {onVacation: onVacation};
            axios.put(`/api/v1/member/${id}`, data).then(response => {
                const member = response.data;
                const itemIndex = this.items.findIndex(item => item.id === member.id);
                if (itemIndex !== -1) {
                    this.items[itemIndex].on_vacation = member.on_vacation;
                }
            }).catch(error => {
                console.log(error.response);
            });

        }

    }

}
</script>

<style scoped>
.md-card {
    width: 100%;
    margin: 4px;
    display: inline-block;
    vertical-align: top;
}

.s-container-flex--left {
    display: flex;
    justify-content: left;
    width: 100%;
}

</style>
