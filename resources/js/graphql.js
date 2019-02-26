import gql from "graphql-tag";

export const CHANNELS_QUERY = gql`
    query {
        channels {
            id
            name
            purpose
        }
    }
`;

export const CHANNEL_QUERY = gql`
    query ($id: ID!){
        channels(id: $id) {
            id
            name
            purpose
        }
    }`;

export const MESSAGES_QUERY = gql`
    query ($id: ID!){
        messages(channel_id: $id) {
            id
            payload
            created_at
        }
    }`;

export const SEND_MESSAGE_MUTATION = gql`
    mutation ($payload: String!, $channel_id: Int!) {
        sendMessage(payload: $payload, channel_id: $channel_id){
            id, 
            payload
        }
    }
 `;


export const USERS_QUERY = gql`
    query {
        users {
            id
            name
            display
            color
            color_two
        }
    }
`;
