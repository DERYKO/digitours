import client from "./client";

export default {
    async getContactTypes(filters) {
        return client.parseResponse(await client.get('/contact-type', filters));
    }
}
