import client from "./client";

export default {
    async getTravelDestinations(filters) {
        return client.parseResponse(await client.get('/travel-destination', filters));
    },
    async getTravelDestination(id) {
        return client.parseResponse(await client.get('/travel-destination/' + id));
    },
    async deleteTravelDestinations(travel_destination) {
        return client.parseResponse(await client.delete('/travel-destination/' + travel_destination.id));
    },
    async createTravelDestination(form) {
        let {file} = form;
        return client.parseResponse(await client.upload('/travel-destination', form, file));
    },
    async updateTravelDestination(form) {
        let {file} = form;
        return client.parseResponse(await client.put('/travel-destination/' + form.id, form, file));
    },
    async deleteTravelDestinationGallery(image) {
        return client.parseResponse(await client.delete('/destination-gallery/' + image.id));
    },
    async createTravelDestinationContact(contact) {
        return client.parseResponse(await client.post('/travel-destination-contact', contact));
    },
    async updateTravelDestinationContact(contact) {
        return client.parseResponse(await client.put('/travel-destination-contact/' + contact.id, contact));
    }
}
