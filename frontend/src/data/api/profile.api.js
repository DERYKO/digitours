import client from "./client";
export default {
    async login(credentials) {
        return client.parseResponse(await client.post('/login', credentials))
    },
    async getProfile(filters) {
        return client.parseResponse(await client.get('/profile', filters))
    },
    async logout(filters) {
        return client.parseResponse(await client.get('/logout', filters))
    },
    async sendResetPasswordLink(credentials) {
        return client.parseResponse(await client.post('/reset', credentials));
    },
    async getUsers(filters) {
        return client.parseResponse(await client.get('/user', filters));
    }
}
